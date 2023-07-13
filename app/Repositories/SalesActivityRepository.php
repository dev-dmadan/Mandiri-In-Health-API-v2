<?php

namespace App\Repositories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use App\Models\SalesActivity;
use App\Traits\MapResponseTrait;
use Illuminate\Support\Arr;

class SalesActivityRepository
{
    use MapResponseTrait;

    public $salesActivityImage = "https://cdn-mdr.appbuilder.my.id/Sales-Activity.jpg";

    public function getAll($contactId, $filter = null)
    {
        $contact = Contact::find($contactId);
        $type = $contact->TypeId;
        $kanal = $contact->MdrLKANALDISTRIBUSIId;

        $isKAKANIT = strtolower($type) == 'f5440a4c-87f8-4b52-9696-863455413a84';
        $isKAKANAL = strtolower($type) == '74b619e2-533a-44cd-a929-ec4869f865fa';
        $isAE = strtolower($type) == '806732ee-f36b-1410-a883-16d83cab0980';

        $data = $this->select()
            ->whereHas('Pipeline', function($query) use($contactId, $kanal, $isKAKANIT, $isKAKANAL, $isAE) {
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
        $isKomit = Arr::has($filter, 'isKomit') ? $filter['isKomit'] : null;

        // $lookupFilter = [
        //     'MdrKanalDistribusiId' => Arr::has($filter, 'kanalId') && !empty($filter['kanalId']) ? $filter['kanalId'] : null,
        //     'MdrProdukId' => Arr::has($filter, 'produkId') && !empty($filter['produkId']) ? $filter['produkId'] : null,
        //     'MdrKaUnitId' => Arr::has($filter, 'kepalaUnitId') && !empty($filter['kepalaUnitId']) ? $filter['kepalaUnitId'] : null,
        //     'MdrInsuranceAgentId' => Arr::has($filter, 'agentId') && !empty($filter['agentId']) ? $filter['agentId'] : null,
        // ];

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
            $data->where("MdrCommitment", (int)$isKomit);
        }

        // foreach ($lookupFilter as $key => $value) {
        //     if(!empty($value) && Str::of($value)->isUuid()) {
        //         $data->where($key, $value);
        //     }
        // }

        return $data;
    }

    public function get($id) 
    {
        return $this->select()
            ->where('Id', $id)
            ->get()
            ->map(function($item) {
                $mapResponse = $this->mapResponse($item, $this->salesActivityImage);
                foreach($this->getFloatColumn() as $key => $value) {
                    if(str_contains($value, 'float|money-short')) {
                        $mapResponse->{$key} = $this->getFloatColumnValue($item->{$key}, 'money');
                    }
                }

                return $mapResponse;
            })
            ->first();
    }

    public function mapResponse($item, $image) 
    {
        $newItem = $this->bindingColumnWithValue($item);

        $pipeline = !empty($item->Pipeline) ? $item->Pipeline : null;

        $newItem['Alamat'] = !empty($pipeline) ? strtoupper($pipeline->MdrAlamat) : "";
        $newItem['PolisStatus'] = $this->getGuidColumnValue($pipeline, 'PolisStatus', 'uppercase');
        $newItem['Provinsi'] = $this->getGuidColumnValue($pipeline, 'Provinsi', 'uppercase');
        $newItem['Kabupaten'] = $this->getGuidColumnValue($pipeline, 'Kabupaten', 'uppercase');
        $newItem['Kecamatan'] = $this->getGuidColumnValue($pipeline, 'Kecamatan', 'uppercase');
        $newItem['Kelurahan'] = $this->getGuidColumnValue($pipeline, 'Kelurahan', 'uppercase');
        $newItem['KodePos'] = $this->getGuidColumnValue($pipeline, 'KodePosLookup', 'uppercase');
        $newItem['NoTelp'] = !empty($pipeline) ? $pipeline->MdrNoTelp : $this->stringEmpty();
        $newItem['Email'] = !empty($pipeline) ? $pipeline->MdrEmail : $this->stringEmpty();
        $newItem['GWP'] = !empty($pipeline) ? $this->getFloatColumnValue($pipeline->MdrGWP, 'money') : $this->floatEmpty('money');
        $newItem['CreatedBy'] = $this->getGuidColumnValue($pipeline, 'CreatedBy', 'uppercase');
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
        return SalesActivity::with('Pipeline')
            ->with('UpdateAktivitas')
            ->with('KanalDistribusi')
            ->with('NamaBadanUsaha')
            ->with('KategoriAsuransiEksisting')
            ->with('AsuransiEkisting')
            ->with('SinergiBankMandiri')
            ->with('KepalaUnit')
            ->with('AgenAsuransi')
            ->with('NamaBroker')
            ->with('TipeProses')
            ->with('ProdukAsuransiSebelumnya')
            ->with('KategoriAsuransiKompetitor')
            ->with('ProdukDitawarkan')
            ->with('AsuransiKompetitor')
            ->with('KategoriAsuransiPemenang')
            ->with('AsuransiPemenang')
            ->with('KategoriLoss1')
            ->with('KategoriLoss2')
            ->with('Produk')
            ->with('KategoriLapse1')
            ->with('KategoriLapse2')
            ->addSelect(array_map(function($item) {
                return 'MdrSalesActivity.'.$item;
            }, array_keys($this->column())));
    }

    private function column()
    {
        return [
            'MdrPipelineId' => 'guid|uppercase',
            'MdrUpdateAktivitasId' => 'guid|uppercase',
            'MdrKanalDistribusiId' => 'guid|uppercase',
            'MdrNamaBadanUsahaId' => 'guid|uppercase',
            'MdrKategoriAsuransiEksistingId' => 'guid|uppercase',
            'MdrAsuransiEkisitingId' => 'guid|uppercase',
            'MdrSinergiBankMandiriId' => 'guid|uppercase',
            'MdrKepalaUnitId' => 'guid|uppercase',
            'MdrAgenAsuransiId' => 'guid|uppercase',
            'MdrNamaBrokerId' => 'guid|uppercase',
            'MdrTipeProsesId' => 'guid|uppercase',
            'MdrProdukAsuransiSebelumnyaId' => 'guid|uppercase',
            'MdrKategoriAsuransiKompetitorId' => 'guid|uppercase',
            'MdrProdukDitawarkanId' => 'guid|uppercase',
            'MdrAsuransiKompetitorId' => 'guid|uppercase',
            'MdrAsuransiPemenangId' => 'guid|uppercase',
            'MdrKategoriAsuransiPemenangId' => 'guid|uppercase',
            'MdrKategoriLoss1Id' => 'guid|uppercase',
            'MdrKategoriLoss2Id' => 'guid|uppercase',
            'MdrProdukId' => 'guid|uppercase',
            'MdrKategoriLapse1Id' => 'guid|uppercase',
            'MdrKategoriLapse2Id' => 'guid|uppercase',
            'Id' => 'guid|primary',
            'MdrKodeBooking' => 'string|uppercase',
            'CreatedOn' => 'datetime',
            'ModifiedOn' => 'datetime',
            'MdrStatusAktivitas' => 'string|uppercase',
            'MdrKeteranganProgres' => 'string|uppercase',
            'MdrCommitment' => 'boolean',
            'MdrLastActivityDate' => 'datetime',
            'MdrPerkiranClosing' => 'string|uppercase',
            'MdrKeteranganSinergiBankMandiri' => 'string|uppercase',
            'MdrHargaPenawaran' => 'float|money-short',
            'MdrTMT' => 'datetime',
            'MdrHargaPenawaranKompetitor' => 'float|money-short',
            'MdrTMB' => 'datetime',
            'MdrAlasanMandiriTerpilih' => 'string|uppercase',
            'MdrHargaPenawaranPemenang' => 'float|money-short',
            'MdrKeteranganLoss' => 'string|uppercase',
            'MdrAlasanPindahProduk' => 'string|uppercase',
            'MdrLossRasio' => 'float|percent',
            'MdrAlasanLapse' => 'string|uppercase',
            'MdrPremiDisetahunkan' => 'float|money-short'
        ];
    }
}