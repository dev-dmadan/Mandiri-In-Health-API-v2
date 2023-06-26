<?php

namespace App\Repositories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use App\Models\Pipeline;
use Illuminate\Support\Arr;

class PipelineRepository
{
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
            ->where('Id', $id)
            ->get()
            ->map(function($item) {
                return $this->mapResponse($item, $this->pipelineImage);
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

        $newItem['Id'] = $item->Id;
<<<<<<< Updated upstream
        $newItem['CreatedOn'] = $item->CreatedOn; 
        $newItem['ModifiedOn'] = $item->ModifiedOn;
        $newItem['created_by'] = $item->created_by->getDisplayValue();
        $newItem['MdrTanggalAktifitasBerkahir'] = $item->MdrTanggalAktifitasBerkahir;
        $newItem['kanal'] = !empty($item->kanal) ? $item->kanal->getDisplayValue() : "";
        $newItem['agent'] = !empty($item->agent) ? $item->agent->getDisplayValue() : "";
        $newItem['kepala_unit'] = !empty($item->kepala_unit) ? $item->kepala_unit->getDisplayValue() : "";
        $newItem['kepala_kanal'] = !empty($item->kepala_kanal) ? $item->kepala_kanal->getDisplayValue() : "";
        $newItem['produk'] = !empty($item->produk) ? $item->produk->getDisplayValue() : "";
        $newItem['status'] = !empty($item->status) ? $item->status->getDisplayValue() : "";
        $newItem['status_polis'] = !empty($item->status_polis) ? $item->status_polis->getDisplayValue() : "";
        $newItem['kategori_asuransi_eksisting'] = !empty($item->kategori_asuransi_eksisting) ? $item->kategori_asuransi_eksisting->getDisplayValue() : "";
        $newItem['asuransi_eksisting'] = !empty($item->asuransi_eksisting) ? $item->asuransi_eksisting->getDisplayValue() : "";
        $newItem['broker'] = !empty($item->broker) ? $item->broker->getDisplayValue() : "";
        $newItem['co_insurance'] = !empty($item->co_insurance) ? $item->co_insurance->getDisplayValue() : "";
        $newItem['syariah'] = !empty($item->syariah) ? $item->syariah->getDisplayValue() : "";
        $newItem['kepemilikan_bu'] = !empty($item->kepemilikan_bu) ? $item->kepemilikan_bu->getDisplayValue() : "";
        $newItem['provinsi'] = !empty($item->provinsi) ? $item->provinsi->getDisplayValue() : "";
        $newItem['kabupaten'] = !empty($item->kabupaten) ? $item->kabupaten->getDisplayValue() : "";
        $newItem['kecamatan'] = !empty($item->kecamatan) ? $item->kecamatan->getDisplayValue() : "";
        $newItem['kelurahan'] = !empty($item->kelurahan) ? $item->kelurahan->getDisplayValue() : "";
        $newItem['kode_pos'] = !empty($item->kode_pos) ? $item->kode_pos->getDisplayValue() : "";
        $newItem['wilayah_badan_usaha'] = !empty($item->wilayah_badan_usaha) ? $item->wilayah_badan_usaha->getDisplayValue() : "";
        $newItem['sektor_industri'] = !empty($item->sektor_industri) ? $item->sektor_industri->getDisplayValue() : "";
        $newItem['sinergi_bank_mandiri'] = !empty($item->sinergi_bank_mandiri) ? $item->sinergi_bank_mandiri->getDisplayValue() : "";
        $newItem['termin_bayar'] = !empty($item->termin_bayar) ? $item->termin_bayar->getDisplayValue() : "";
        $newItem['perkiraan_closing'] = !empty($item->perkiraan_closing) ? $item->perkiraan_closing->getDisplayValue() : "";
        $newItem['quotation'] = !empty($item->quotation) ? $item->quotation->getDisplayValue() : "";
        $newItem['update_aktifitas'] = !empty($item->update_aktifitas) ? $item->update_aktifitas->getDisplayValue() : "";
=======
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
        return Pipeline::with('kanal')
            ->with('agent')
            ->with('kepala_unit')
            ->with('kepala_kanal')
            ->with('produk')
            ->with('status')
            ->with('status_polis')
            ->with('kategori_asuransi_eksisting')
            ->with('asuransi_eksisting')
            ->with('broker')
            ->with('co_insurance')
            ->with('syariah')
            ->with('kepemilikan_bu')
            ->with('provinsi')
            ->with('kabupaten')
            ->with('kecamatan')
            ->with('kelurahan')
            ->with('kode_pos')
            ->with('wilayah_badan_usaha')
            ->with('sektor_industri')
            ->with('sinergi_bank_mandiri')
            ->with('termin_bayar')
            ->with('perkiraan_closing')
            ->with('quotation')
            ->with('update_aktifitas')
            ->with('created_by')
=======
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
            ->with('CreatedBy')
>>>>>>> Stashed changes
            ->addSelect(array_map(function($item) {
                return 'MdrPipeline.'.$item;
            }, array_keys($this->column())));
    }

    private function column()
    {
        return [
            'MdrKanalDistribusiId' => 'guid',
            'MdrInsuranceAgentId' => 'guid',
            'MdrKaUnitId' => 'guid',
            'MdrKaKPMId' => 'guid',
            'MdrKategoriAsuransiEksistingId' => 'guid',
            'MdrAsuransiEksistingId' => 'guid',
            'MdrBrokerNameId' => 'guid',
            'MdrCoInsuranceId' => 'guid',
            'MdrSyariahId' => 'guid',
            'MdrKepemilikanBUId' => 'guid',
            'MdrKodePosLookupId' => 'guid',
            'MdrKelurahanId' => 'guid',
            'MdrKecamatanId' => 'guid',
            'MdrKabupatenId' => 'guid',
            'MdrProvinsiId' => 'guid',
            'MdrWilayahBadanUsahaId' => 'guid',
            'MdrSektorIndustriId' => 'guid',
            'MdrSinergiBankMandiriId' => 'guid',
            'MdrProdukId' => 'guid',
            'MdrStatusId' => 'guid',
            'MdrPolisStatusId' => 'guid',
            'MdrTerminBayarId' => 'guid',
            'MdrPerkiraanClosingId' => 'guid',
            'MdrQuotationId' => 'guid',
            'MdrUpdateAktifitasId' => 'guid',
            'CreatedById' => 'guid',
            'Id' => 'guid|primary',
            'CreatedOn' => 'datetime',
            'ModifiedOn' => 'datetime', 
            'MdrEmailAgent' => 'string',
            'MdrName' => 'string',
            'MdrNamaDireksi' => 'string',
            'MdrPICName' => 'string',
            'MdrNoTelp' => 'string',
            'MdrEmail' => 'string',
            'MdrAlamat' => 'string',
            'MdrProvinsiWilayahBU' => 'string',
            'MdrKodeBooking' => 'string',
            'MdrJumlahPeserta' => 'string',
            'MdrPremiDisetahunkan' => 'float',
            'MdrPremiPerTermin' => 'float',
            'MdrGWP' => 'float',
            'MdrKomitmentAgen' => 'boolean',
            'MdrKomitmenKaUnit' => 'boolean',
            'MdrStatusAktivitas' => 'string',
            'MdrTanggalAktifitasBerkahir' => 'datetime',
            'MdrKeteranganProgres' => 'string',
            'CreatedById' => 'guid'
        ];
    }
}