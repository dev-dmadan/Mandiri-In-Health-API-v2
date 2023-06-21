<?php

namespace App\Http\Controllers;

use App\Repositories\ClosingRepository;
use Illuminate\Http\Request;

class ClosingController extends Controller
{
    protected $closingRepo;

    public function __construct(ClosingRepository $closingRepo)
    {
        $this->closingRepo = $closingRepo;
    }

    public function index(Request $request)
    {
        $contactId = $request->query('contact');
        $search = $request->query('search');
        $isKomit = $request->query('is_komit');

        $perPage = !empty($request->query('per_page')) ? $request->query('per_page') : 10;
        
        $data = $this->closingRepo->getAll(
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
            return $this->closingRepo->mapResponse($item, $this->closingRepo->closingImage);
        });

        return response()->json($data);
    }
}
