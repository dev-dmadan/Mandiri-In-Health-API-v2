<?php

namespace App\Repositories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use App\Models\Closing;
use Illuminate\Support\Arr;

class ClosingRepository
{
    public $closingImage = "https://cdn-mdr.appbuilder.my.id/Page-Closing.jpg";

    public function getAll($contactId, $filter = null)
    {
        $contact = Contact::find($contactId);
        $type = $contact->TypeId;
        $kanal = $contact->MdrLKANALDISTRIBUSIId;

        $isKAKANIT = strtolower($type) == 'f5440a4c-87f8-4b52-9696-863455413a84';
        $isKAKANAL = strtolower($type) == '74b619e2-533a-44cd-a929-ec4869f865fa';
        $isAE = strtolower($type) == '806732ee-f36b-1410-a883-16d83cab0980';

        $data = $this->select()
            ->whereHas('pipeline', function($query) use($contactId, $kanal, $isKAKANIT, $isKAKANAL, $isAE) {
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
        // $isKomit = Arr::has($filter, 'isKomit') ? $filter['isKomit'] : null;

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

        // if(!is_null($isKomit)) {
        //     $data->where("MdrCommitment", (int)$isKomit);
        // }

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
                return $this->mapResponse($item, $this->closingImage);
            })
            ->first();
    }

    public function mapResponse($item, $image) 
    {
        $newItem = [];

        $stringColumn = array_filter($this->column(), function($value, $key) {
            return $value == 'string';
        }, ARRAY_FILTER_USE_BOTH);
        $booleanColumn = array_filter($this->column(), function($value, $key) {
            return $value == 'boolean';
        }, ARRAY_FILTER_USE_BOTH);

        foreach ($stringColumn as $key => $value) {
            $newItem[$key] = $item->{$key};
        }

        foreach ($booleanColumn as $key => $value) {
            $newItem[$key] = (bool)$item->{$key};
        }

        $pipeline = !empty($item->pipeline) ? $item->pipeline : null;
        $quotation = !empty($item->quotation) ? $item->quotation : null;

        $newItem['Id'] = $item->Id;
        $newItem['CreatedOn'] = $item->CreatedOn; 
        $newItem['ModifiedOn'] = $item->ModifiedOn;
        $newItem['pipeline'] = !empty($pipeline) ? $pipeline->getDisplayValue() : "";
        $newItem['quotation'] = !empty($quotation) ? $quotation->getDisplayValue() : "";
        $newItem['status'] = !empty($item->status) ? $item->status->getDisplayValue() : "";
        $newItem['produk'] = !empty($item->produk) ? $item->produk->getDisplayValue() : "";
        $newItem['alamat'] = !empty($pipeline) ? $pipeline->MdrAlamat : "";
        $newItem['kode_pos'] = !empty($pipeline) ? (!empty($pipeline->kode_pos) ? $pipeline->kode_pos->getDisplayValue() : "") : "";
        $newItem['created_by'] = !empty($pipeline) ? (!empty($pipeline->created_by) ? $pipeline->created_by->getDisplayValue() : "") : "";
        $newItem['no_telp'] = !empty($quotation) ? $quotation->MdrPhoneNumber : "";
        $newItem['email'] = !empty($quotation) ? $quotation->MdrEmail : "";
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
        return Closing::with('pipeline')
            ->with('pipeline.kode_pos')
            ->with('pipeline.created_by')
            ->with('quotation')
            ->with('status')
            ->with('produk')
            ->addSelect(array_map(function($item) {
                return 'MdrClosing.'.$item;
            }, array_keys($this->column())));
    }

    private function column()
    {
        return [
            'MdrPipelineId' => 'guid',
            'MdrQuotationId' => 'guid',
            'MdrClosingStatusId' => 'guid',
            'Id' => 'guid|primary',
            'CreatedOn' => 'datetime',
            'ModifiedOn' => 'datetime',
            'MdrName' => 'string',
            'MdrNotes' => 'string',
            'MdrSLAHari' => 'string',
            'MdrPendingDokumen' => 'boolean',
        ];
    }
}