<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class LookupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $lookup)
    {
        $search = $request->query('search');
        $perPage = !empty($request->query('per_page')) ? $request->query('per_page') : 100;
        $orderBy = !empty($request->query('order')) ? $request->query('order') : 'CreatedOn';
        $direction = !empty($request->query('direction')) ? $request->query('direction') : 'DESC';
        $filter = $request->query('filter');

        $this->isLookupAvailable($lookup);

        $model = app($this->availableLookup()[$lookup]);
        $tableName = $model->getTable();

        $column = [
            'Id' => $model->getKeyName(), 
            'Name' => $model->displayValue
        ];
        $model = $model::select(array_values($column));
        if(!empty($search)) {
            $model->where($model->displayValue, 'like', '%'.$search.'%');
        }

        if(!empty($filter) && Str::isJson($filter)) {
            $filterJson = json_decode($filter);
            $schema = Schema::connection(env('DB_CONNECTION'));
            foreach ($filterJson as $value) {
                $isColumnExists = $schema->hasColumn($tableName, $value->column);
                if(!$isColumnExists) {
                    continue;
                }

                $columnType = $schema->getColumnType($tableName, $value->column);
                if($columnType == 'guid') {
                    if($value->column == 'Id' || Str::isUuid($value->value)) {
                        $model->where($value->column, $value->value);
                    } else {
                        $prefix = substr($value->column, 0, 3);
                        $lookupProp = $prefix == 'Mdr' ? substr($value->column, 3, -2) : substr($value->column, 0, -2);
                        
                        $_model = app($this->availableLookup()[$lookup]);
                        $filterModelName = get_class($_model->{$lookupProp}()->getRelated());                        
                        $filterModel = app($filterModelName);
                        $displayValue = $filterModel->displayValue;

                        $model->whereHas($lookupProp, function($q) use($value, $displayValue) {
                            $q->where($displayValue, 'like', '%'.$value->value.'%');
                        });
                    }
                } else {
                    $model->where($value->column, $value->value);
                }
            }
        }
        
        $data = $model->orderBy($orderBy, $direction)
            ->paginate($perPage)
            ->through(function ($item, $index) use($column) {                
                foreach ($column as $key => $value) {
                    $item->$key = strtoupper($item->$value);
                }
                return $item;
            });
        return response()->json($data);
    }

    public function lookupForFilter()
    {
        $defaultLookup = [
            'polis-stataus' => [
                'model' => $this->availableLookup()['polis-stataus'],
                'order' => 'Name',
                'direction' => 'ASC'
            ],
            'kanal' => [
                'model' => $this->availableLookup()['kanal'],
                'order' => 'MdrCode',
                'direction' => 'ASC'
            ],
            'produk' => [
                'model' => $this->availableLookup()['produk'],
                'order' => 'MdrSeqNo',
                'direction' => 'ASC'
            ],
            'kepala-kanit' => [
                'model' => $this->availableLookup()['kepala-kanit'],
                'order' => 'MdrName',
                'direction' => 'ASC'
            ],
            'bulan' => [
                'model' => $this->availableLookup()['bulan'],
                'order' => 'Number',
                'direction' => 'ASC'
            ],
        ];
        
        $data = [];
        foreach ($defaultLookup as $key => $value) {
            $lookup = app($value['model']);
            $column = [ 
                'Id' => $lookup->getKeyName(), 
                'Name' => $lookup->displayValue
            ];

            $data[$key] = $lookup::select(array_values($column))
                ->orderBy($value['order'], $value['direction'])
                ->get();
        }

        return $data;
    }

    public function availableLookup()
    {
        return [
            'status-pipeline' => 'App\Models\StatusPipeline',
            'kanal-distribusi' => 'App\Models\Kanal',
            'polis-stataus' => 'App\Models\StatusPolis',
            'produk' => 'App\Models\Produk',
            'pipeline' => 'App\Models\Pipeline',
            'kepala-kanit' => 'App\Models\KepalaUnit',
            'agent' => 'App\Models\Agent',
            'bulan' => 'App\Models\MonthYear'
        ];
    }

    public function isLookupAvailable($lookup)
    {
        $lookupFilter = Arr::where(
            $this->availableLookup(), 
            function ($value, $key) use($lookup) {
                return strtolower($key) == strtolower($lookup);
            }
        );

        if(count($lookupFilter) > 0) {
            return true;
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Master data tidak ditemukan'
            ]);
        }
    }
}
