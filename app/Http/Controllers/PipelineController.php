<?php

namespace App\Http\Controllers;

use App\Http\Requests\PipelineRequest;
use App\Models\Pipeline;
use App\Repositories\PipelineRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Services\CreatioService;

class PipelineController extends Controller
{    
    protected $pipelineRepo;

    public function __construct(PipelineRepository $pipelineRepo)
    {
        $this->pipelineRepo = $pipelineRepo;
    }

    public function index(Request $request)
    {
        $contactId = $request->query('contact');
        $search = $request->query('search');
        $kanalId = $request->query('kanal');
        $produkId = $request->query('produk');
        $kepalaUnitId = $request->query('kepala_unit');
        $agentId = $request->query('agent');
        $statusId = $request->query('status');
        $statusPolisId = $request->query('status_polis');
        $isKomit = $request->query('is_komit');

        $type = $request->query('type');
        $perPage = !empty($request->query('per_page')) ? $request->query('per_page') : 10;
        
        switch ($type) {
            case 'top-3':
                $data = empty($contactId) ? 
                    $this->emptyPipeline()->get() : 
                    $this->pipelineRepo->getAll(contactId: $contactId)
                        ->orderBy('MdrPremiDisetahunkan', 'DESC')
                        ->take(3)
                        ->get()
                        ->map(function($item) {
                            return $this->pipelineRepo->mapResponse($item, $this->pipelineRepo->top3PipelineImage);
                        });
                break;
            
            default:
                $data = empty($contactId) ? 
                    $this->emptyPipeline()->paginate($perPage) : 
                        $this->pipelineRepo->getAll(
                            contactId: $contactId,
                            filter: [
                                'search' => $search,
                                'kanalId' => $kanalId,
                                'produkId' => $produkId,
                                'kepalaUnitId' => $kepalaUnitId,
                                'agentId' => $agentId,
                                'statusId' => $statusId,
                                'statusPolisId' => $statusPolisId,
                                'isKomit' => $isKomit
                            ]
                        )
                        ->orderBy('CreatedOn', 'DESC')
                        ->paginate($perPage)
                        ->through(function ($item, $key) {                
                            return $this->pipelineRepo->mapResponse($item, $this->pipelineRepo->pipelineImage);
                        });
                break;
        }

        return response()->json($data);
    }

    public function show($id)
    {
        return response()->json($this->pipelineRepo->get($id));
    }

    public function store(PipelineRequest $request)
    {
        $password = Crypt::decryptString($request->input('encrypt_password'));
        $creatio = new CreatioService($request->user()->username, $password);

        $columnIsCanNull = [
            'MdrSyariahId' => 'guid',
            'MdrNamaDireksi' => 'string',
            'MdrTanggalLahirDireksi' => 'string',
            'MdrPICName' => 'string',
            'MdrEmail' => 'string',
            'MdrKeteranganSinergiBankMandiri' => 'string',
            'MdrKomitmentAgen' => 'boolean',
            'MdrKomitmenKaUnit' => 'boolean',
        ];

        $data = [];
        foreach($request->except(['encrypt_password', 'SecretKey']) as $key => $value) {
            if(array_key_exists($key, $columnIsCanNull)) {
                if(($columnIsCanNull[$key] == 'string' || $columnIsCanNull[$key] == 'guid') && empty($value)) {
                    continue;
                }

                if($columnIsCanNull[$key] == 'boolean' && is_null($value)) {
                    continue;
                }
            }

            $data[$key] = $value;
        }

        return $creatio->oData4('MdrPipeline')->post($data);
    }

    public function update(PipelineRequest $request, $id)
    {
        $password = Crypt::decryptString($request->input('encrypt_password'));
        $creatio = new CreatioService($request->user()->username, $password);

        $data = $request->except(['encrypt_password', 'SecretKey', '_method']);
        return $creatio->oData4('MdrPipeline')->patch($id, $data);
    }

    public function destroy(Request $request, $id)
    {
        $password = Crypt::decryptString($request->input('encrypt_password'));
        $creatio = new CreatioService($request->user()->username, $password);

        return $creatio->rest('APIRepositoryWebService', 'DeletePipeline')->post(['Id' => $id]);
    }

    private function emptyPipeline()
    {
        return Pipeline::whereNull('Id');
    }
}