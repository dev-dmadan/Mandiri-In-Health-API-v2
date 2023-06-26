<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesActivityRequest;
use App\Models\SalesActivity;
use App\Repositories\SalesActivityRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Services\CreatioService;

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
        
        $data = empty($contactId) ? 
            $this->emptySalesActivity()->paginate($perPage) : 
            $this->salesAcitivityRepo->getAll(
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

    public function update(SalesActivityRequest $request, $id)
    {
        $password = Crypt::decryptString($request->input('encrypt_password'));
        $creatio = new CreatioService($request->user()->username, $password);

        $data = $request->except(['encrypt_password', 'SecretKey', '_method']);
        return $creatio->oData4('MdrSalesActivity')->patch($id, $data);
    }

    private function emptySalesActivity()
    {
        return SalesActivity::whereNull('Id');
    }
}
