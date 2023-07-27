<?php

namespace App\Repositories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use App\Models\Agent;
use App\Traits\MapResponseTrait;

class AgentRepository
{
    use MapResponseTrait;

    public function getAll($filter = null) 
    {
        $data = $this->select();
        
        if(empty($filter)) {
            return $data;
        }

        if(!empty($filter['search'])) {
            $search = $filter['search'];
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

        if(!empty($filter['kanal']) && Str::of($filter['kanal'])->isUuid()) {
            $data->where('MdrKanalId', $filter['kanal']);
        }

        return $data;
    }

    public function mapResponse($item) 
    {
        $newItem = $this->bindingColumnWithValue($item);

        return (object)$newItem;
    }
    
    private function select()
    {
        return Agent::with('Kanal')
            ->with('LNAMAAGEN')
            ->addSelect(array_map(function($item) {
                return 'MdrAgent.'.$item;
            }, array_keys($this->column())));
    }

    private function column()
    {
        return [
            'MdrKanalId' => 'guid|uppercase',
            'Id' => 'guid|primary',
            'MdrName' => 'string|uppercase',
            'MdrKodeAgen' => 'string|uppercase',
            'MdrNoHP' => 'string|uppercase',
        ];
    }
}