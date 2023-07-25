<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClosingRequest;
use App\Models\Closing;
use App\Repositories\ClosingRepository;
use Illuminate\Http\Request;
use App\Services\CreatioService;
use Illuminate\Support\Facades\Crypt;

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
        $orderBy = !empty($request->query('order')) ? 'MdrClosing.'.$request->query('order') : 'MdrClosing.CreatedOn';
        $direction = !empty($request->query('direction')) ? $request->query('direction') : 'DESC';

        $data = empty($contactId) ? 
            $this->emptyClosing()->paginate($perPage) : 
            $this->closingRepo->getAll(
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
            ->orderBy($orderBy, $direction)
            ->paginate($perPage)
            ->through(function ($item, $key) {                
                return $this->closingRepo->mapResponse($item, $this->closingRepo->closingImage);
            });

        return response()->json($data);
    }

    public function show($id)
    {
        return response()->json($this->closingRepo->get($id));
    }

    public function update(ClosingRequest $request, $id)
    {
        $password = Crypt::decryptString($request->input('encrypt_password'));
        $creatio = new CreatioService($request->user()->username, $password);

        $data = $request->except(['encrypt_password', 'SecretKey', '_method']);
        return $creatio->oData4('MdrClosing')->patch($id, $data);
    }

    public function destroy(Request $request, $id)
    {
        $password = Crypt::decryptString($request->input('encrypt_password'));
        $creatio = new CreatioService($request->user()->username, $password);

        return $creatio->rest('APIRepositoryWebService', 'DeleteClosing')->post(['Id' => $id]);
    }

    private function emptyClosing()
    {
        return Closing::whereNull('Id');
    }
}
