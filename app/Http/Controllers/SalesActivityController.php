<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesActivityRequest;
use App\Models\HistorySalesActivity;
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
        $orderBy = !empty($request->query('order')) ? 'MdrSalesActivity.'.$request->query('order') : 'MdrSalesActivity.CreatedOn';
        $direction = !empty($request->query('direction')) ? $request->query('direction') : 'DESC';
        
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
            ->orderBy($orderBy, $direction)
            ->paginate($perPage)
            ->through(function ($item, $key) {                
                return $this->salesAcitivityRepo->mapResponse($item, $this->salesAcitivityRepo->salesActivityImage);
            });

        return response()->json($data);
    }

    public function show($id)
    {
        return response()->json($this->salesAcitivityRepo->get($id));
    }

    public function update(SalesActivityRequest $request, $id)
    {
        $isValid = $this->updateValidation($id, $request->input('MdrUpdateAktivitasId'));
        if(!$isValid['success']) {
            return response()->json($isValid);
        }

        $password = Crypt::decryptString($request->input('encrypt_password'));
        $creatio = new CreatioService($request->user()->username, $password);

        $data = $request->except(['encrypt_password', 'SecretKey', '_method']);
        return $creatio->oData4('MdrSalesActivity')->patch($id, $data);
    }

    public function destroy(Request $request, $id)
    {
        $password = Crypt::decryptString($request->input('encrypt_password'));
        $creatio = new CreatioService($request->user()->username, $password);

        return $creatio->rest('APIRepositoryWebService', 'DeleteSalesActivity')->post(['Id' => $id]);
    }

    private function emptySalesActivity()
    {
        return SalesActivity::whereNull('Id');
    }

    public function updateValidation($id, $updateActivitasId)
    {
        $result = [
            'success' => true,
            'message' => ''
        ];

        $updateActivitasLookup = [
            'CallEmailFirstMeeting' => "3471cad1-c38e-43a3-a8cf-dbc97be40ed9",
            'FactFinding' => "90f24029-adb0-4ce6-ae5f-d8a7ad8bbfc2",
            'Aannwijzing' => "cb6c2e57-faaa-4d6b-a227-de0cee9f1de0",
            'PresentasiAwal' => "ce74304e-eb5f-4f03-8fb2-b36fcfc77fd8",
            'PengajuanQuotation' => "21b452f6-876d-47eb-a506-613ba6bdfb14",
            'PenawaranPremiKeBU' => "946e13fb-58a9-4ee1-b8bc-683907241118",
            'PresentasiPenawaranPremi' => "ed12df25-91e3-42bf-befd-7fe111f76d3c",
            'KlasifikasiPenawaran' => "d261ebc2-72d3-4ec7-b875-0b8f60cfe40b",
            'NegosiasiDenganBU' => "d9e75caa-298a-4f8f-8eac-574168e69ea3",
            'NegosiasiDenganInternal' => "d291736d-09c2-4617-b521-cae2768881c0",
            'PenawaranRevisi' => "7ae1d153-a29e-4672-b179-ca4160f744ef",
            'FollowUpPenawaranRevisi' => "2cffdc85-ad8b-49e6-ac35-8dc93e9fb3b7",
            'Closing' => "2a33f124-5334-4a83-9f37-116375afc719",
            'Loss' => "12f0f582-13f2-4e54-af67-63b5b04cb2ce",
            'ExpiredQuotation' => "29ecc6b2-3495-4553-86c2-d3cda3271687"
        ];

        $pipelineId = SalesActivity::where('Id', $id)->select('MdrPipelineId')->first()->MdrPipelineId;
        $history = HistorySalesActivity::where('MdrPipelineId', $pipelineId)->get();

        $totalValidasi1 = $history->whereIn('MdrUpdateAktivitasId', [
            $updateActivitasLookup['FactFinding'],
            $updateActivitasLookup['Aannwijzing'],
            $updateActivitasLookup['PresentasiAwal']]
        )->count();
        $totalValidasi2 = $history
            ->where('MdrUpdateAktivitasId', $updateActivitasLookup['PengajuanQuotation'])
            ->count();
        $totalValidasi3 = $history
            ->where('MdrUpdateAktivitasId', $updateActivitasLookup['PenawaranPremiKeBU'])
            ->count();

        // if (strtolower($updateActivitasId) == $updateActivitasLookup['FactFinding'] || 
        //     strtolower($updateActivitasId) == $updateActivitasLookup['Aannwijzing'] ||
        //     strtolower($updateActivitasId) == $updateActivitasLookup['PresentasiAwal']) { 
            
        //     if(count($history) == 0) {
        //         $result['success'] = false;
        //         $result['message'] = 'Tidak bisa lanjut ke aktivitas yang dipilih, karena belum melakukan aktivitas sebelumnya';

        //         return $result;
        //     }
        // }

        // if (strtolower($updateActivitasId) == $updateActivitasLookup['PengajuanQuotation']) {
        //     if($totalValidasi1 == 0) {
        //         $result['success'] = false;
        //         $result['message'] = 'Tidak bisa lanjut ke aktivitas yang dipilih, karena belum melakukan aktivitas sebelumnya';

        //         return $result; 
        //     }
        // }

        // if (strtolower($updateActivitasId) == $updateActivitasLookup['PenawaranPremiKeBU'] ||
        //     strtolower($updateActivitasId) == $updateActivitasLookup['PresentasiPenawaranPremi'] ||
        //     strtolower($updateActivitasId) == $updateActivitasLookup['KlasifikasiPenawaran'] ||
        //     strtolower($updateActivitasId) == $updateActivitasLookup['NegosiasiDenganBU'] ||
        //     strtolower($updateActivitasId) == $updateActivitasLookup['NegosiasiDenganInternal'] ||
        //     strtolower($updateActivitasId) == $updateActivitasLookup['PenawaranRevisi'] ||
        //     strtolower($updateActivitasId) == $updateActivitasLookup['FollowUpPenawaranRevisi']) {
        //     if($totalValidasi2 == 0) {
        //         $result['success'] = false;
        //         $result['message'] = 'Tidak bisa lanjut ke aktivitas yang dipilih, karena belum melakukan aktivitas sebelumnya';

        //         return $result; 
        //     }
        // }

        // if (strtolower($updateActivitasId) == $updateActivitasLookup['PresentasiPenawaranPremi'] ||
        //     strtolower($updateActivitasId) == $updateActivitasLookup['KlasifikasiPenawaran'] ||
        //     strtolower($updateActivitasId) == $updateActivitasLookup['NegosiasiDenganBU'] ||
        //     strtolower($updateActivitasId) == $updateActivitasLookup['NegosiasiDenganInternal'] ||
        //     strtolower($updateActivitasId) == $updateActivitasLookup['PenawaranRevisi'] ||
        //     strtolower($updateActivitasId) == $updateActivitasLookup['FollowUpPenawaranRevisi']) {
        //     if($totalValidasi3 == 0) {
        //         $result['success'] = false;
        //         $result['message'] = 'Tidak bisa lanjut ke aktivitas yang dipilih, karena belum melakukan aktivitas sebelumnya';

        //         return $result; 
        //     }
        // }

        // if (strtolower($updateActivitasId) == $updateActivitasLookup['Closing'] || 
        //     strtolower($updateActivitasId) == $updateActivitasLookup['Loss']) {
            
        //     if($totalValidasi1 == 0 || $totalValidasi2 == 0 || $totalValidasi3 == 0){
        //         $result['success'] = false;
        //         $result['message'] = 'Tidak bisa lanjut ke aktivitas yang dipilih, karena belum melakukan aktivitas sebelumnya';
        //     }

        //     return $result;
        // }

        return $result;
    }
}
