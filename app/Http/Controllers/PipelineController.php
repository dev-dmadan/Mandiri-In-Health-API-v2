<?php

namespace App\Http\Controllers;

use App\Repositories\PipelineRepository;
use Illuminate\Http\Request;

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
                $data = $this->pipelineRepo->getAll(contactId: $contactId)
                    ->orderBy('MdrPremiDisetahunkan', 'DESC')
                    ->take(3)
                    ->get()
                    ->map(function($item) {
                        return $this->pipelineRepo->mapResponse($item, $this->pipelineRepo->top3PipelineImage);
                    });
                break;
            
            default:
                $data = $this->pipelineRepo->getAll(
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
}
