<?php

namespace App\Http\Controllers;

use App\Repositories\QuotationRepository;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    protected $quotationRepo;

    public function __construct(QuotationRepository $quotationRepo)
    {
        $this->quotationRepo = $quotationRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $contactId = $request->query('contact');
        $search = $request->query('search');
        $kanalId = $request->query('kanal');
        $produkId = $request->query('produk');
        $kepalaUnitId = $request->query('kepala_unit');
        $agentId = $request->query('agent');
        $statusId = $request->query('status');

        $type = $request->query('type');
        $perPage = !empty($request->query('per_page')) ? $request->query('per_page') : 10;
        
        switch ($type) {
            case 'top-5':
                $data = $this->quotationRepo->getAll(contactId: $contactId)
                    ->leftJoin('MdrPipeline', 'MdrPipeline.Id', '=', 'MdrQuotation.MdrBUNameId')
                    ->orderBy('MdrPipeline.MdrPremiDisetahunkan', 'DESC')
                    ->take(5)
                    ->get()
                    ->map(function($item) {
                        return $this->quotationRepo->mapResponse($item, $this->quotationRepo->top5Quotationmage);
                    });
                break;
            
            default:
                $data = $this->quotationRepo->getAll(
                    contactId: $contactId,
                    filter: [
                        'search' => $search,
                        'kanalId' => $kanalId,
                        'produkId' => $produkId,
                        'kepalaUnitId' => $kepalaUnitId,
                        'agentId' => $agentId,
                        'statusId' => $statusId,
                    ]
                )
                ->orderBy('CreatedOn', 'DESC')
                ->paginate($perPage)
                ->through(function ($item, $key) {                
                    return $this->quotationRepo->mapResponse($item, $this->quotationRepo->quotationmage);
                });

                break;
        }

        return response()->json($data);
    }

    public function show($id)
    {
        return response()->json($this->quotationRepo->get($id));
    }
}
