<?php

namespace App\Http\Controllers;

use App\Repositories\SalesActivityRepository;
use Illuminate\Http\Request;

class SalesActivityController extends Controller
{
    protected $salesAcitivityRepo;

    public function __construct(SalesActivityRepository $salesAcitivityRepo)
    {
        $this->salesAcitivityRepo = $salesAcitivityRepo;
    }

    public function index(Request $request)
    {
        $contactId = $request->query('contact');
        $search = $request->query('search');
        $isKomit = $request->query('is_komit');

        $perPage = !empty($request->query('per_page')) ? $request->query('per_page') : 10;
        
        $data = $this->salesAcitivityRepo->getAll(
            contactId: $contactId,
            filter: [
                'search' => $search,
                'isKomit' => $isKomit,
                // 'kanalId' => $kanalId,
                // 'produkId' => $produkId,
                // 'kepalaUnitId' => $kepalaUnitId,
                // 'agentId' => $agentId,
                // 'statusId' => $statusId,
            ]
        )
        ->orderBy('CreatedOn', 'DESC')
        ->paginate($perPage)
        ->through(function ($item, $key) {                
            return $this->salesAcitivityRepo->mapResponse($item, $this->salesAcitivityRepo->salesActivityImage);
        });

        return response()->json($data);
    }
}
