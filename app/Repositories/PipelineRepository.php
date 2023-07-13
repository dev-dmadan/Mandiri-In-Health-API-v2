<?php

namespace App\Repositories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use App\Models\Pipeline;
use App\Traits\MapResponseTrait;
use Illuminate\Support\Arr;

class PipelineRepository
{
    use MapResponseTrait;

    public $top3PipelineImage = "https://cdn-mdr.appbuilder.my.id/Top-3-Pipeline.jpg";
    public $pipelineImage = "https://cdn-mdr.appbuilder.my.id/Badan-Usaha.jpg";

    public function getAll($contactId, $filter = null) 
    {
        $contact = Contact::find($contactId);
        $type = $contact->TypeId;
        $kanal = $contact->MdrLKANALDISTRIBUSIId;

        $isKAKANIT = strtolower($type) == 'f5440a4c-87f8-4b52-9696-863455413a84';
        $isKAKANAL = strtolower($type) == '74b619e2-533a-44cd-a929-ec4869f865fa';
        $isAE = strtolower($type) == '806732ee-f36b-1410-a883-16d83cab0980';

        $data = $this->select()
            ->when($isAE, function ($query) use($contactId) {
                $query->where('CreatedById', $contactId);
            })
            ->when($isKAKANIT || $isKAKANAL, function ($query) use($kanal) {
                $query->where('MdrKanalDistribusiId', $kanal);
            }, function ($query) use($contactId) {
                return $query->where('CreatedById', $contactId);
            });
        
        if(empty($filter)) {
            return $data;
        }

        $search = Arr::has($filter, 'search') && !empty($filter['search']) ? $filter['search'] : null;
        $isKomit = Arr::has($filter, 'isKomit') ? $filter['isKomit'] : null;
        $lookupFilter = [
            'MdrKanalDistribusiId' => Arr::has($filter, 'kanalId') && !empty($filter['kanalId']) ? $filter['kanalId'] : null,
            'MdrProdukId' => Arr::has($filter, 'produkId') && !empty($filter['produkId']) ? $filter['produkId'] : null,
            'MdrKaUnitId' => Arr::has($filter, 'kepalaUnitId') && !empty($filter['kepalaUnitId']) ? $filter['kepalaUnitId'] : null,
            'MdrInsuranceAgentId' => Arr::has($filter, 'agentId') && !empty($filter['agentId']) ? $filter['agentId'] : null,
            'MdrStatusId' => Arr::has($filter, 'statusId') && !empty($filter['statusId']) ? $filter['statusId'] : null,
            'MdrPolisStatusId' => Arr::has($filter, 'statusPolisId') && !empty($filter['statusPolisId']) ? $filter['statusPolisId'] : null
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

        if(!is_null($isKomit)) {
            $data->where("MdrKomitmentAgen", (int)$isKomit);
        }

        foreach ($lookupFilter as $key => $value) {
            if(!empty($value) && Str::of($value)->isUuid()) {
                $data->where($key, $value);
            }
        }

        return $data;
    }

    public function get($id) 
    {
        return $this->select()
            ->with(['RiwayatSalesActivity' => function($query) {
                $query->with('UpdateAktivitas')
                    ->select(
                        'MdrPipelineId', 
                        'MdrStatusAktifitas', 
                        'MdrTanggalAktivitasTerkahir',
                        'MdrUpdateAktivitasId',
                        'MdrKomitmen',
                        'MdrKeteranganProgres'
                    );
            }])
            ->where('Id', $id)
            ->get()
            ->map(function($item) {
                $mapResponse = $this->mapResponse($item, $this->pipelineImage);
                foreach($this->getFloatColumn() as $key => $value) {
                    if(str_contains($value, 'float|money-short')) {
                        $mapResponse->{$key} = $this->getFloatColumnValue($item->{$key}, 'money');
                    }
                }
                
                $mapResponse->RiwayatSalesActivity = [];
                foreach ($item->RiwayatSalesActivity as $key => $value) {
                    $mapResponse->RiwayatSalesActivity[$key] = (object)[
                        'MdrStatusAktifitas' => $this->getStringColumnValue($value->MdrStatusAktifitas, 'uppercase'),
                        'MdrTanggalAktivitasTerkahir' => $this->getDateTimeColumnValue($value->MdrTanggalAktivitasTerkahir),
                        'UpdateAktivitas' => $this->getGuidColumnValue($value, 'UpdateAktivitas', 'uppercase'),
                        'MdrKomitmen' => (bool)$value->MdrKomitmen,
                        'MdrKeteranganProgres' => $this->getStringColumnValue($value->MdrKeteranganProgres, 'uppercase'),
                    ];
                }

                return $mapResponse;
            })
            ->first();
    }

    public function sum($contactId, $isKomit, $column) 
    {
        $contact = Contact::find($contactId);
        $type = $contact->TypeId;
        $kanal = $contact->MdrLKANALDISTRIBUSIId;

        $isKAKANIT = strtolower($type) == 'f5440a4c-87f8-4b52-9696-863455413a84';
        $isKAKANAL = strtolower($type) == '74b619e2-533a-44cd-a929-ec4869f865fa';
        $isAE = strtolower($type) == '806732ee-f36b-1410-a883-16d83cab0980';

        $columnName = "total_$column";
        $data = Pipeline::select(
            DB::raw("SUM($column) as $columnName")
        )
        // ->where('CreatedById', $contactId)
        ->where('MdrKomitmentAgen', (int)$isKomit)
        ->when($isAE, function ($query) use($contactId) {
            $query->where('CreatedById', $contactId);
        })
        ->when($isKAKANIT || $isKAKANAL, function ($query) use($kanal) {
            $query->where('MdrKanalDistribusiId', $kanal);
        }, function ($query) use($contactId) {
            return $query->where('CreatedById', $contactId);
        })
        ->first();
        return !empty($data) ? (float)$data->{$columnName} : 0;
    }

    public function count($contactId, $isKomit) 
    {
        $contact = Contact::find($contactId);
        $type = $contact->TypeId;
        $kanal = $contact->MdrLKANALDISTRIBUSIId;

        $isKAKANIT = strtolower($type) == 'f5440a4c-87f8-4b52-9696-863455413a84';
        $isKAKANAL = strtolower($type) == '74b619e2-533a-44cd-a929-ec4869f865fa';
        $isAE = strtolower($type) == '806732ee-f36b-1410-a883-16d83cab0980';

        $data = Pipeline::select(
            DB::raw("COUNT(*) as count_pipeline")
        )
        // ->where('CreatedById', $contactId)
        ->where('MdrKomitmentAgen', (int)$isKomit)
        ->when($isAE, function ($query) use($contactId) {
            $query->where('CreatedById', $contactId);
        })
        ->when($isKAKANIT || $isKAKANAL, function ($query) use($kanal) {
            $query->where('MdrKanalDistribusiId', $kanal);
        }, function ($query) use($contactId) {
            return $query->where('CreatedById', $contactId);
        })
        ->first();
        return !empty($data) ? (float)$data->count_pipeline : 0;
    }

    public function mapResponse($item, $image) 
    {
        $newItem = $this->bindingColumnWithValue($item);
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
    
    private function select() 
    {
        return Pipeline::with('KanalDistribusi')
            ->with('InsuranceAgent')
            ->with('KaUnit')
            ->with('KepalaKPM')
            ->with('Produk')
            ->with('Status')
            ->with('PolisStatus')
            ->with('KategoriAsuransiEksisting')
            ->with('AsuransiEksisting')
            ->with('BrokerName')
            ->with('CoInsurance')
            ->with('Syariah')
            ->with('KepemilikanBU')
            ->with('Provinsi')
            ->with('Kabupaten')
            ->with('Kecamatan')
            ->with('Kelurahan')
            ->with('KodePosLookup')
            ->with('WilayahBadanUsaha')
            ->with('SektorIndustri')
            ->with('SinergiBankMandiri')
            ->with('TerminBayar')
            ->with('PerkiraanClosing')
            ->with('Quotation')
            ->with('UpdateAktifitas')
            ->with('PKSType')
            ->with('PaymentMethod')
            ->with('NamaBURenewal')
            ->with('CreatedBy')
            ->addSelect(array_map(function($item) {
                return 'MdrPipeline.'.$item;
            }, array_keys($this->column())));
    }

    private function column()
    {
        return [
            'MdrKanalDistribusiId' => 'guid|uppercase',
            'MdrInsuranceAgentId' => 'guid|uppercase',
            'MdrKaUnitId' => 'guid|uppercase',
            'MdrKaKPMId' => 'guid|uppercase',
            'MdrKategoriAsuransiEksistingId' => 'guid|uppercase',
            'MdrAsuransiEksistingId' => 'guid|uppercase',
            'MdrBrokerNameId' => 'guid|uppercase',
            'MdrCoInsuranceId' => 'guid|uppercase',
            'MdrSyariahId' => 'guid|uppercase',
            'MdrKepemilikanBUId' => 'guid|uppercase',
            'MdrKodePosLookupId' => 'guid|uppercase',
            'MdrKelurahanId' => 'guid|uppercase',
            'MdrKecamatanId' => 'guid|uppercase',
            'MdrKabupatenId' => 'guid|uppercase',
            'MdrProvinsiId' => 'guid|uppercase',
            'MdrWilayahBadanUsahaId' => 'guid|uppercase',
            'MdrSektorIndustriId' => 'guid|uppercase',
            'MdrSinergiBankMandiriId' => 'guid|uppercase',
            'MdrProdukId' => 'guid|uppercase',
            'MdrStatusId' => 'guid|uppercase',
            'MdrPolisStatusId' => 'guid|uppercase',
            'MdrTerminBayarId' => 'guid|uppercase',
            'MdrPerkiraanClosingId' => 'guid|uppercase',
            'MdrQuotationId' => 'guid|uppercase',
            'MdrUpdateAktifitasId' => 'guid|uppercase',
            'MdrPKSTypeId' => 'guid|uppercase',
            'MdrPaymentMethodId' => 'guid|uppercase',
            'MdrNamaBURenewalId' => 'guid|uppercase',
            'CreatedById' => 'guid|uppercase',
            'Id' => 'guid|primary',
            'CreatedOn' => 'datetime',
            'ModifiedOn' => 'datetime', 
            'MdrEmailAgent' => 'string',
            'MdrName' => 'string|uppercase',
            'MdrNamaDireksi' => 'string|uppercase',
            'MdrPICName' => 'string|uppercase',
            'MdrNoTelp' => 'string|uppercase',
            'MdrEmail' => 'string',
            'MdrAlamat' => 'string|uppercase',
            'MdrProvinsiWilayahBU' => 'string|uppercase',
            'MdrKodeBooking' => 'string|uppercase',
            'MdrJumlahPeserta' => 'int',
            'MdrPremiDisetahunkan' => 'float|money-short',
            'MdrPremiPerTermin' => 'float|money-short',
            'MdrGWP' => 'float|money-short',
            'MdrKomitmentAgen' => 'boolean',
            'MdrKomitmenKaUnit' => 'boolean',
            'MdrStatusAktivitas' => 'string|uppercase',
            'MdrTanggalAktifitasBerkahir' => 'datetime',
            'MdrKeteranganProgres' => 'string|uppercase',
            'MdrPremiPerBulan' => 'float|money-short',
            'MdrTmt' => 'datetime',
            'MdrTmb' => 'datetime',
            'MdrRenewalJatuhTempo' => 'string|uppercase',
            'MdrTahunPipeline' => 'string',
            'MdrTanggalLahirDireksi' => 'datetime',
            'MdrKeteranganSinergiBankMandiri' => 'string|uppercase',
            'MdrKodeBU' => 'string'
        ];
    }
}