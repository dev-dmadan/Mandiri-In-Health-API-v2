<?php

namespace App\Repositories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use App\Models\Quotation;
use App\Traits\MapResponseTrait;
use Illuminate\Support\Arr;

class QuotationRepository
{
    use MapResponseTrait;

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
                $stringColumn = $this->getStringColumn();
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
            ->with(['Installment' => function ($query) {
                $query->select('MdrQuotationId', 'MdrName', 'MdrDueDate', 'MdrPercentage');
            }])
            ->where('Id', $id)
            ->get()
            ->map(function($item) {
                $mapResponse = $this->mapResponse($item, $this->quotationmage);
                $mapResponse->Installment = [];
                foreach ($item->Installment as $key => $value) {
                    $mapResponse->Installment[$key] = (object)[
                        'MdrName' => $this->getStringColumnValue($value->MdrName, 'uppercase'),
                        'MdrDueDate' => $this->getDateTimeColumnValue($value->MdrDueDate),
                        'MdrPercentage' => $this->getFloatColumnValue($value->MdrPercentage, 'percent'),
                    ];
                }
                
                return $mapResponse;
            })
            ->first();
    }

    public function mapResponse($item, $image) {
        $newItem = $this->bindingColumnWithValue($item);

        $BUName = !empty($item->BUName) ? $item->BUName : null;
        
        $newItem['PolisStatus'] = $this->getGuidColumnValue($BUName, 'PolisStatus', 'uppercase');
        $newItem['Alamat'] = !empty($BUName) ? strtoupper($BUName->MdrAlamat) : $this->stringEmpty();
        $newItem['KodePos'] = $this->getGuidColumnValue($BUName, 'KodePosLookup', 'uppercase');
        $newItem['Kelurahan'] = $this->getGuidColumnValue($BUName, 'Kelurahan', 'uppercase');
        $newItem['Kecamatan'] = $this->getGuidColumnValue($BUName, 'Kecamatan', 'uppercase');
        $newItem['Kabupaten'] = $this->getGuidColumnValue($BUName, 'Kabupaten', 'uppercase');
        $newItem['Provinsi'] = $this->getGuidColumnValue($BUName, 'Provinsi', 'uppercase');
        $newItem['GWP'] = $this->getFloatColumnValue($BUName->MdrGWP, 'money-short');
        $newItem['CreatedBy'] = $this->getGuidColumnValue($BUName, 'CreatedBy', 'uppercase');
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
            ->with('Title')
            ->with('CaraBayar')
            ->with('SLABayarKlaimReimburse')
            ->with('KadaluarsaKlaim')
            ->with('KadaluarsaReKlaim')
            ->with('SLAPembayaranPremPengajuan')
            ->with('MaxUsiaAnakPengajuan')
            ->with('BackdatedMutasiPeserta')
            ->with('PreExistingCondition')
            ->with('RefundPremi')
            ->with('ASOType')
            ->with('Plan')
            ->addSelect(array_map(function($item) {
                return 'MdrQuotation.'.$item;
            }, array_keys($this->column())));
    }

    private function column()
    {
        return [
            'MdrKanalDistribusiId' => 'guid|uppercase',
            'MdrBUNameId' => 'guid|uppercase',
            'MdrQuotationStatusId' => 'guid|uppercase',
            'MdrAgentNameId' => 'guid|uppercase',
            'MdrKAUNITId' => 'guid|uppercase',
            'MdrKepalaKanalId' => 'guid|uppercase',
            'MdrProductId' => 'guid|uppercase',
            'MdrSkemaProductId' => 'guid|uppercase',
            'MdrTujuanKlaimReimbursePengajuanId' => 'guid|uppercase',
            'MdrTujuanKlaimReimburseDiSetujuiId' => 'guid|uppercase',
            'MdrTitleId' => 'guid|uppercase',
            'MdrCaraBayarId' => 'guid|uppercase',
            'MdrSLABayarKlaimReimburseId' => 'guid|uppercase',
            'MdrKadaluarsaKlaimId' => 'guid|uppercase',
            'MdrKadaluarsaReKlaimId' => 'guid|uppercase',
            'MdrSLAPembayaranPremPengajuanId' => 'guid|uppercase',
            'MdrMaxUsiaAnakPengajuanId' => 'guid|uppercase',
            'MdrBackdatedMutasiPesertaId' => 'guid|uppercase',
            'MdrPreExistingConditionId' => 'guid|uppercase',
            'MdrRefundPremiId' => 'guid|uppercase',
            'MdrASOTypeId' => 'guid|uppercase',
            'MdrPlanId' => 'guid|uppercase',
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
            'MdrASO1' => 'float|money-short',
            'MdrASO2' => 'float|money-short',
            'MdrASO3' => 'float|money-short',
            'MdrJumlahDepositAso' => 'float|money-short',
            'MdrMinTopUpAso' => 'float|money-short',
            'MdrFeeAso' => 'float|money-short',
            'MdrEkses' => 'boolean',
            'MdrEKSES1' => 'float|money-short',
            'MdrEKSES2' => 'float|money-short',
            'MdrEKSES3' => 'float|money-short',
            'MdrMinTopUpEkses' => 'float|money-short',
            'MdrPoolfund' => 'boolean',
            'MdrPoolfund1' => 'float|money-short',
            'MdrPoolfund2' => 'float|money-short',
            'MdrPoolfund3' => 'float|money-short',
            'MdrPoolfund4' => 'float|money-short',
            'MdrPoolfund5' => 'float|money-short',
            'MdrName' => 'string|uppercase',
            'MdrDireksiName' => 'string|uppercase',
            'MdrPICName' => 'string|uppercase',
            'MdrPhoneNumber' => 'string|uppercase',
            'MdrEmail' => 'string',
            'MdrNameOnCard' => 'string|uppercase',
            'MdrAlias' => 'string|uppercase',
            'MdrNoProposal' => 'string|uppercase',
            'MdrBookingCode' => 'string|uppercase',
            'MdrKomisiPersentasePengajuan' => 'float|percent',
            'MdrORPersentasePengajuan' => 'float|percent',
            'MdrIPPersentasePengajuan' => 'float|percent',
            'MdrKomisiPersentaseDiSetujui' => 'float|percent',
            'MdrORPersentaseDiSetujui' => 'float|percent',
            'MdrIPPersentaseDiSetujui' => 'float|percent',
            'MdrSLAPembayaranPremiPengajuan' => 'string|uppercase',
            'MdrSLAPembayaranKlaimPengajuan' => 'string|uppercase',
            'MdrKadaluarsaKlaimPengajuan' => 'string|uppercase',
            'MdrReKlaimPengajuan' => 'string|uppercase',
            'MdrSLAPembayaranPremiDiSetujui' => 'int',
            'MdrSLAPembayaranKlaimDiSetujui' => 'int',
            'MdrKadaluarsaKlaimDiSetujui' => 'int',
            'MdrReKlaimDisetujui' => 'int',
            'MdrTotalPesertaPengajuan' => 'int',
            'MdrTotalPegawaiPengajuan' => 'int',
            'MdrMaxUsiaDewasaPengajuan' => 'int',
            'MdrMaxUsiaAnakPengaujan' => 'int',
            'MdrMaxJumlahAnakPengajuan' => 'int',
            'MdrMaxUsiaPersalinanPengajuan' => 'int',
            'MdrMaxJumlahPersalinanPengajuan' => 'int',
            'MdrTotalPesertaDiSetujui' => 'int',
            'MdrTotalPegawaiDiSetujui' => 'int',
            'MdrMaxUsiaDewasaDiSetujui' => 'int',
            'MdrMaxUsiaAnakDisetujui' => 'int',
            'MdrMaxJumlahAnakDiSetujui' => 'int',
            'MdrMaxUsiaPersalinanDiSetujui' => 'int',
            'MdrMaxJumlahPersalinanDisetujui' => 'int',
            'MdrCatatanHealthtalk' => 'string|uppercase',
            'MdrCatatanMinimcu' => 'string|uppercase',
            'MdrCatatanMedivac' => 'string|uppercase',
            'MdrCatatanOverseas' => 'string|uppercase',
            'MdrCatatanPickUpClaim' => 'string|uppercase',
            'MdrCatatanProfitSharing' => 'string|uppercase',
            'MdrCatatanWellnessProgram' => 'string|uppercase',
            'MdrCatatamTelemedicine' => 'string|uppercase',
            'MdrUnderwritingNotes' => 'string|uppercase',
            'MdrVirtualAso' => 'string|uppercase',
            'MdrCatatanAso' => 'string|uppercase',
            'MdrVirtualEkses' => 'string|uppercase',
            'MdrCatatanEkses' => 'string|uppercase',
            'MdrCatatanPoolfund' => 'string|uppercase',
            'MdrKategoriPenyakit2' => 'string|uppercase',
            'MdrKategoriPenyakit3' => 'string|uppercase',
            'MdrCatatanMarketing' => 'string|uppercase',
            'MdrASODepositAwal' => 'float|money',
            'MdrASOTopUP' => 'int',
            'MdrBenefitSubenefit2' => 'boolean',
            'MdrBenefitSubenefit3' => 'boolean',
            'MdrEksesDiTagihDiTempat' => 'boolean',
            'MdrDepositEkses' => 'boolean',
            'MdrJumlahDepositEkses' => 'float|money-short',
            'MdrTopUpEkses' => 'int',
            
        ]; 
    }
}