<?php

namespace App\Repositories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use App\Models\Quotation;
use Illuminate\Support\Arr;

class QuotationRepository
{
    public $top5Quotationmage = "https://cdn-mdr.appbuilder.my.id/Top-5-Quotation.jpg";
    public $quotationmage = "https://cdn-mdr.appbuilder.my.id/Page-Quotation.jpg";

    public function getAll($contactId, $filter = null) {
        $contact = Contact::find($contactId);
        $type = $contact->TypeId;
        $kanal = $contact->MdrLKANALDISTRIBUSIId;

        $isKAKANIT = strtolower($type) == 'f5440a4c-87f8-4b52-9696-863455413a84';
        $isKAKANAL = strtolower($type) == '74b619e2-533a-44cd-a929-ec4869f865fa';
        $isAE = strtolower($type) == '806732ee-f36b-1410-a883-16d83cab0980';

        $data = $this->select()
            ->whereHas('BUName', function($query) use($contactId, $kanal, $isKAKANIT, $isKAKANAL, $isAE) {
                $query->when($isAE, function ($q) use($contactId) {
                    $q->where('CreatedById', $contactId);
                })
                ->when($isKAKANIT || $isKAKANAL, function ($q) use($kanal) {
                    $q->where('MdrKanalDistribusiId', $kanal);
                }, function ($q) use($contactId) {
                    return $q->where('CreatedById', $contactId);
                });
            });
        
        if(empty($filter)) {
            return $data;
        }

        $search = Arr::has($filter, 'search') && !empty($filter['search']) ? $filter['search'] : null;
        $lookupFilter = [
            'MdrKanalDistribusiId' => Arr::has($filter, 'kanalId') && !empty($filter['kanalId']) ? $filter['kanalId'] : null,
            'MdrProductId' => Arr::has($filter, 'produkId') && !empty($filter['produkId']) ? $filter['produkId'] : null,
            'MdrKAUNITId' => Arr::has($filter, 'kepalaUnitId') && !empty($filter['kepalaUnitId']) ? $filter['kepalaUnitId'] : null,
            'MdrAgentNameId' => Arr::has($filter, 'agentId') && !empty($filter['agentId']) ? $filter['agentId'] : null,
            'MdrQuotationStatusId' => Arr::has($filter, 'statusId') && !empty($filter['statusId']) ? $filter['statusId'] : null
        ];

        if(!empty($search)) {
            $data->where(function($query) use($search) {
                $stringColumn = array_filter($this->column(), function($value, $key) {
                    return $key == 'string';
                }, ARRAY_FILTER_USE_BOTH);
                for ($i=0; $i < count($stringColumn); $i++) { 
                    if($i == 0) {
                        $query->where($stringColumn[$i], 'like', '%'.$search.'%');
                    } else {
                        $query->orWhere($stringColumn[$i], 'like', '%'.$search.'%');
                    }
                }
            });
        }

        foreach ($lookupFilter as $key => $value) {
            if(!empty($value) && Str::of($value)->isUuid()) {
                $data->where($key, $value);
            }
        }

        return $data;
    }
    
    public function get($id) {
        return $this->select()
            ->with(['installment' => function ($query) {
                $query->select('MdrQuotationId', 'MdrName', 'MdrDueDate', 'MdrPercentage');
            }])
            ->where('Id', $id)
            ->get()
            ->map(function($item) {
                $mapResponse = $this->mapResponse($item, $this->quotationmage);
                $mapResponse->installment = [];
                foreach ($item->installment as $key => $value) {
                    $mapResponse->installment[$key] = (object)[
                        'MdrName' => $value->MdrName,
                        'MdrDueDate' => $value->MdrDueDate,
                        'MdrPercentage' => $value->MdrPercentage,
                    ];
                }
                
                return $mapResponse;
            })
            ->first();
    }

    public function mapResponse($item, $image) {
        $newItem = [];

        $stringColumn = array_filter($this->column(), function($value, $key) {
            return $value == 'string' || $value == 'datetime';
        }, ARRAY_FILTER_USE_BOTH);
        $guidColumn = array_filter($this->column(), function($value, $key) {
            return $value == 'guid';
        }, ARRAY_FILTER_USE_BOTH);
        $floatColumn = array_filter($this->column(), function($value, $key) {
            return $value == 'float';
        }, ARRAY_FILTER_USE_BOTH);
        $booleanColumn = array_filter($this->column(), function($value, $key) {
            return $value == 'boolean';
        }, ARRAY_FILTER_USE_BOTH);

        foreach ($stringColumn as $key => $value) {
            $newItem[$key] = $item->{$key};
        }

        foreach ($floatColumn as $key => $value) {
            $newItem[$key] = 'IDR '.number_format((float)$item->{$key}, 2);
        }

        foreach ($booleanColumn as $key => $value) {
            $newItem[$key] = (bool)$item->{$key};
        }

        foreach ($guidColumn as $key => $value) {
            $prefix = substr($key, 0, 3);
            $lookupProp = $prefix == 'Mdr' ? substr($key, 3, -2) : substr($key, 0, -2);
            $newItem[$lookupProp] = !empty($item->{$lookupProp}) ? $item->{$lookupProp}->getDisplayValue() : "";
        }

        $BUName = !empty($item->BUName) ? $item->BUName : null;
        
        $newItem['Id'] = $item->Id;
        $newItem['Alamat'] = !empty($BUName) ? $BUName->MdrAlamat : "";
        $newItem['KodePos'] = !empty($BUName) ? (!empty($BUName->KodePosLookup) ? $BUName->KodePosLookup->getDisplayValue() : "") : "";
        $newItem['GWP'] = !empty($BUName) ? 'IDR '.number_format((float)$BUName->MdrGWP, 2) : "IDR 0.00";
        $newItem['CreatedBy'] = !empty($BUName) ? (!empty($BUName->CreatedBy) ? $BUName->CreatedBy->getDisplayValue() : "") : "";
        $newItem['image'] = [
            'id' => 0,
            'full' => [
                'url' => $image
            ],
            'thumb' => [
                'url' => $image
            ],
        ];

        return (object)$newItem;
    }

    private function select() {
        return Quotation::with('KanalDistribusi')
            ->with('BUName')
            ->with('QuotationStatus')
            ->with('AgentName')
            ->with('KAUNIT')
            ->with('KepalaKanal')
            ->with('Product')
            ->with('SkemaProduct')
            ->with('TujuanKlaimReimbursePengajuan')
            ->with('TujuanKlaimReimburseDiSetujui')
            ->addSelect(array_map(function($item) {
                return 'MdrQuotation.'.$item;
            }, array_keys($this->column())));
    }

    private function column()
    {
        return [
            'MdrKanalDistribusiId' => 'guid',
            'MdrBUNameId' => 'guid',
            'MdrQuotationStatusId' => 'guid',
            'MdrAgentNameId' => 'guid',
            'MdrKAUNITId' => 'guid',
            'MdrKepalaKanalId' => 'guid',
            'MdrProductId' => 'guid',
            'MdrSkemaProductId' => 'guid',
            'MdrTujuanKlaimReimbursePengajuanId' => 'guid',
            'MdrTujuanKlaimReimburseDiSetujuiId' => 'guid',
            'Id' => 'guid|primary',
            'CreatedOn' => 'datetime', 
            'ModifiedOn'=> 'datetime', 
            'MdrInsuranceStartDate' => 'datetime',
            'MdrInsuranceEndDate' => 'datetime',
            'MdrP' => 'boolean',
            'MdrI' => 'boolean',
            'MdrS' => 'boolean',
            'MdrA' => 'boolean',
            'MdrHealthtalk' => 'boolean',
            'MdrMinimcu' => 'boolean',
            'MdrMedivac' => 'boolean',
            'MdrOverseas' => 'boolean',
            'MdrPickUpClaim' => 'boolean',
            'MdrProfitSharing' => 'boolean',
            'MdrWellnessProgram' => 'boolean',
            'MdrTelemedicine' => 'boolean',
            'MdrAso' => 'boolean',
            'MdrASO1' => 'float',
            'MdrASO2' => 'float',
            'MdrASO3' => 'float',
            'MdrJumlahDepositAso' => 'float',
            'MdrMinTopUpAso' => 'float',
            'MdrFeeAso' => 'float',
            'MdrEkses' => 'boolean',
            'MdrEKSES1' => 'float',
            'MdrEKSES2' => 'float',
            'MdrEKSES3' => 'float',
            'MdrMinTopUpEkses' => 'float',
            'MdrPoolfund' => 'boolean',
            'MdrPoolfund1' => 'float',
            'MdrPoolfund2' => 'float',
            'MdrPoolfund3' => 'float',
            'MdrPoolfund4' => 'float',
            'MdrPoolfund5' => 'float',
            'MdrName' => 'string',
            'MdrDireksiName' => 'string',
            'MdrPICName' => 'string',
            'MdrPhoneNumber' => 'string',
            'MdrEmail' => 'string',
            'MdrNameOnCard' => 'string',
            'MdrAlias' => 'string',
            'MdrNoProposal' => 'string',
            'MdrBookingCode' => 'string',
            'MdrKomisiPersentasePengajuan' => 'string',
            'MdrORPersentasePengajuan' => 'string',
            'MdrIPPersentasePengajuan' => 'string',
            'MdrKomisiPersentaseDiSetujui' => 'string',
            'MdrORPersentaseDiSetujui' => 'string',
            'MdrIPPersentaseDiSetujui' => 'string',
            'MdrSLAPembayaranPremiPengajuan' => 'string',
            'MdrSLAPembayaranKlaimPengajuan' => 'string',
            'MdrKadaluarsaKlaimPengajuan' => 'string',
            'MdrReKlaimPengajuan' => 'string',
            'MdrSLAPembayaranPremiDiSetujui' => 'string',
            'MdrSLAPembayaranKlaimDiSetujui' => 'string',
            'MdrKadaluarsaKlaimDiSetujui' => 'string',
            'MdrReKlaimDisetujui' => 'string',
            'MdrTotalPesertaPengajuan' => 'string',
            'MdrTotalPegawaiPengajuan' => 'string',
            'MdrMaxUsiaDewasaPengajuan' => 'string',
            'MdrMaxUsiaAnakPengaujan' => 'string',
            'MdrMaxJumlahAnakPengajuan' => 'string',
            'MdrMaxUsiaPersalinanPengajuan' => 'string',
            'MdrMaxJumlahPersalinanPengajuan' => 'string',
            'MdrTotalPesertaDiSetujui' => 'string',
            'MdrTotalPegawaiDiSetujui' => 'string',
            'MdrMaxUsiaDewasaDiSetujui' => 'string',
            'MdrMaxUsiaAnakDisetujui' => 'string',
            'MdrMaxJumlahAnakDiSetujui' => 'string',
            'MdrMaxUsiaPersalinanDiSetujui' => 'string',
            'MdrMaxJumlahPersalinanDisetujui' => 'string',
            'MdrCatatanHealthtalk' => 'string',
            'MdrCatatanMinimcu' => 'string',
            'MdrCatatanMedivac' => 'string',
            'MdrCatatanOverseas' => 'string',
            'MdrCatatanPickUpClaim' => 'string',
            'MdrCatatanProfitSharing' => 'string',
            'MdrCatatanWellnessProgram' => 'string',
            'MdrCatatamTelemedicine' => 'string',
            'MdrUnderwritingNotes' => 'string',
            'MdrVirtualAso' => 'string',
            'MdrCatatanAso' => 'string',
            'MdrVirtualEkses' => 'string',
            'MdrCatatanEkses' => 'string',
            'MdrCatatanPoolfund' => 'string',
        ]; 
    }
}