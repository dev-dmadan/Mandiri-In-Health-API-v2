<?php

namespace App\Http\Controllers;

use App\Traits\CreatioHelperTrait;
use Illuminate\Http\Request;

class ReportAPIController extends Controller
{
    use CreatioHelperTrait {
        CreatioHelperTrait::__construct as private creatioHelper;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->creatioHelper();
    }
    /**
     * GET KANAL DISTRIBUSI
     */
    public function getKanalDistribusi(Request $request, $isJSON = true)
    {
        $response = $this->restCreatio([
            'service' => 'FilterReportWebService',
            'method' => 'GetKanalDistribusi'
        ], 'POST', false, [
            //parameter here
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
     * GET PRODUCT
     */
    public function getProuct(Request $request, $isJSON = true)
    {
        $response = $this->restCreatio([
            'service' => 'FilterReportWebService',
            'method' => 'GetProduct'
        ], 'POST', false, [
            //parameter here
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
     * GET PERKIRAAN CLOSING
     */
    public function getPerkiraanClosing(Request $request, $isJSON = true)
    {
        $response = $this->restCreatio([
            'service' => 'FilterReportWebService',
            'method' => 'GetPerkiraanClosing'
        ], 'POST', false, [
            //parameter here
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
     * GET MONTH
     */
    public function getMonth(Request $request, $isJSON = true)
    {
        $response = $this->restCreatio([
            'service' => 'FilterReportWebService',
            'method' => 'GetMonth'
        ], 'POST', false, [
            //parameter here
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

     /**
     * GET TARGET
     */
    public function getTarget(Request $request, $isJSON = true)
    {
        $response = $this->restCreatio([
            'service' => 'FilterReportWebService',
            'method' => 'GetTarget'
        ], 'POST', false, [
            //parameter here
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

       /**
     * GET TIPE KINERJA
     */
    public function getTipeKinerja(Request $request, $isJSON = true)
    {
        $response = $this->restCreatio([
            'service' => 'FilterReportWebService',
            'method' => 'GetTipeKinerja'
        ], 'POST', false, [
            //parameter here
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
     * GET KEPALA UNIT
     */
    public function getKaKanit(Request $request, $isJSON = true)
    {
        $response = $this->restCreatio([
            'service' => 'FilterReportWebService',
            'method' => 'GetKepalaUnit'
        ], 'POST', false, [
            //parameter here
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
     * GET KEPALA KANAL
     */
    public function getKaKanal(Request $request, $isJSON = true)
    {
        $response = $this->restCreatio([
            'service' => 'FilterReportWebService',
            'method' => 'GetKepalaKanal'
        ], 'POST', false, [
            //parameter here
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
     * GET AGEN
     */
    public function getAgen(Request $request, $isJSON = true)
    {
        $response = $this->restCreatio([
            'service' => 'FilterReportWebService',
            'method' => 'GetAgen'
        ], 'POST', false, [
            //parameter here
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
    * GET LAPORAN GWP
    */
    public function getLaporanGWP(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportLaporanGWPWebService',
            'method' => 'LaporanGWP'
        ], 'POST', false, [
            'PageNumber' => $request->has('PageNumber') ? $request->input('PageNumber') : 0,
            'PageSize' => $request->has('PageSize') ? $request->input('PageSize') : 0,
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'ProductId' => $request->has('ProductId') ? $request->input('ProductId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
    * GET ACTUAL PER KANAL
    */
    public function getActualPerKanal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportActualPerkanalWebService',
            'method' => 'ActualPerKanal'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
    * GET ACTUAL PER PRODUK
    */
    public function getActualPerProduk(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ActualPerProdukWebService',
            'method' => 'ActualPerProduk'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    
    /**
    /**
    * GET KINERJA BISNIS
    */
    public function getKinerjaBisnis(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportKinerjaWebService',
            'method' => 'KinerjaBisnis'
        ], 'POST', false, [
         //   'Id' => $request->has('Id') ? $request->input('Id') : "",
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
    * GET KINERJA BISNIS PER KANAL
    */
    public function getKinerjaBisnisPerKanal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportKinerjaWebService',
            'method' => 'KinerjaBisnisPerkanal'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
    * GET KINERJA BISNIS PER PRODUCT
    */
    public function getKinerjaProduct(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportKinerjaWebService',
            'method' => 'KinerjaProduk'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
    * GET KINERJA PRODUCT PER KANAL
    */
    public function getKinerjaProductPerKanal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportKinerjaWebService',
            'method' => 'KinerjaProdukPerkanal'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
     /**
    * GET KINERJA AGEN PER PRODUK
    */
    public function getKinerjaProdukPerAgen(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportKinerjaWebService',
            'method' => 'KinerjaProdukPerAgen'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'KaUnitId' => $request->has('KaUnitId') ? $request->input('KaUnitId') : $guidEmpty,
            'AgenId' => $request->has('AgenId') ? $request->input('AgenId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

     /**
    * GET KINERJA KANIT PER PRODUK
    */
    public function getKinerjaProdukPerKanit(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportKinerjaWebService',
            'method' => 'KinerjaProdukPerKanit'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'KaUnitId' => $request->has('KaUnitId') ? $request->input('KaUnitId') : $guidEmpty,
            // 'AgenId' => $request->has('AgenId') ? $request->input('AgenId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
    * GET KINERJA KA KPM
    */
    public function getKinerjaKAKPM(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportKinerjaWebService',
            'method' => 'KinerjaKaKPM'
        ], 'POST', false, [
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
    * GET KINERJA KA UNIT
    */
    public function getKinerjaKAUnit(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportKinerjaWebService',
            'method' => 'KinerjaKaUnit'
        ], 'POST', false, [
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
    * GET KINERJA AGEN
    */
    public function getKinerjaAgen(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportKinerjaWebService',
            'method' => 'KinerjaAgen'
        ], 'POST', false, [
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
    * GET KINERJA PERBULAN KANAL
    */
    public function getKinerjaPerbulanKanal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportKinerjaWebService',
            'method' => 'KinerjaPerbulanKanal'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 

    }

    /**
    * GET KINERJA PERBULAN KANIT
    */
    public function getKinerjaPerbulanKanit(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportKinerjaWebService',
            'method' => 'KinerjaPerbulanKanit'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'KaUnitId' => $request->has('KaUnitId') ? $request->input('KaUnitId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 

    }

    /**
    * GET KINERJA PERBULAN AGEN
    */
    public function getKinerjaPerbulanAgen(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportKinerjaWebService',
            'method' => 'KinerjaPerbulanAgen'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            // 'KepalaKanitId' => $request->has('KepalaKanitId') ? $request->input('KepalaKanitId') : $guidEmpty,
            'AgenId' => $request->has('AgenId') ? $request->input('AgenId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
    * GET LEADING INDICATOR KANAL
    */
    public function getLeadingIndicatorKanal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportLeadingIndicatorWebService',
            'method' => 'LeadingIndicatorNewBusinessKanal'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 

    }

    /**
    * GET LEADING INDICATOR KANAL PER BULAN
    */
    public function getLeadingIndicatorKanalPerBulan(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportLeadingIndicatorWebService',
            'method' => 'LeadingIndicatorNewBusinessKanalPerbulan'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 

    }



     /**
    * GET LEADING INDICATOR AGEN PERBULAN
    */
    public function getLeadingIndicatorAgenPerbulan(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportKinerjaWebService',
            'method' => 'LeadingIndicatorNewBusinessAgenPerbulan'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'AgentId' => $request->has('AgentId') ? $request->input('AgentId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 

    }
    
    /**
    * GET LAPORAN GWP DIKLAT
    */
    // public function getLaporanGWPDiklat(Request $request, $isJSON = true)
    // {
    //     $guidEmpty = "00000000-0000-0000-0000-000000000000";
    //     $response = $this->restCreatio([
    //         'service' => 'ReportKinerjaWebService',
    //         'method' => 'LeadingIndicatorNewBusinessAgenPerbulan'
    //     ], 'POST', false, [
    //         'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
    //         'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
    //         'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
    //         'AgentId' => $request->has('AgentId') ? $request->input('AgentId') : $guidEmpty,
    //         'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
    //     ]);
        
    //     if($isJSON) {
    //         return $response->Success ? response()->json($response->Response) : response()->json($response);
    //     }
        
    //     return $response->Success ? $response->Response : $response; 

    // }

    /**
    * GET REKAP GWP BADAN USAHA NB/RN
    */
    public function getRekapGwpBadanUsaha(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportRekapitulasiGWPWebService',
            'method' => 'RekapGWPBuNewBusinessRenewal'
        ], 'POST', false, [
            'PageNumber' => $request->has('PageNumber') ? $request->input('PageNumber') : 0,
            'PageSize' => $request->has('PageSize') ? $request->input('PageSize') : 0,
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 

    }

    /**
    * GET TARGET KANAL
    */
    public function getTargetPerKanal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportDaftarTargetServiceWebService',
            'method' => 'TargetKanal'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 

    }

    /**
    * GET REKAP GWP BADAN USAHA NB/RN
    */
    public function getTargetProduk(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportDaftarTargetServiceWebService',
            'method' => 'TargetProduk'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 

    }

    /**
    * GET ACTUAL PROPOSAL PER KANAL
    */
    public function getActualProposalPerKanal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportActualProposalWebService',
            'method' => 'ActualProposalPerKanal'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 

    }

    /**
    * GET ACTUAL PROPOSAL PER BULAN
    */
    public function getActualProposalPerBulan(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportActualProposalWebService',
            'method' => 'ActualProposalPerBulan'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 

    }

    /**
    * GET ACTUAL POLIS ANP PER KANAL
    */
    public function getActualPolisAnpPerKanal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportActualProposalWebService',
            'method' => 'ActualPolisAnpPerKanal'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
    * GET ACTUAL POLIS ANP PER BULAN
    */
    public function getActualPolisAnpPerBulan(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportActualProposalWebService',
            'method' => 'ActualPolisAnpPerBulan'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

     /**
    * GET DAFTAR PROPOSAL
    */
    public function getDaftarProposal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportDaftarProposalWebService',
            'method' => 'DaftarProposal'
        ], 'POST', false, [
            'PageNumber' => $request->has('PageNumber') ? $request->input('PageNumber') : 0,
            'PageSize' => $request->has('PageSize') ? $request->input('PageSize') : 0,
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
    * GET DAFTAR POLIS ANP
    */
    public function getDaftarPolisAnp(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportDaftarProposalWebService',
            'method' => 'DaftarPolisAnp'
        ], 'POST', false, [
            'PageNumber' => $request->has('PageNumber') ? $request->input('PageNumber') : 0,
            'PageSize' => $request->has('PageSize') ? $request->input('PageSize') : 0,
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
    * GET REKAP PROGRESS PIPELINE RENEWAL PER BULAN
    */
    public function getRekapProgressPipelineRenewalPerBulan(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportPipelineRenewalWebService',
            'method' => 'ProgressPipelineRenewalPerBulan'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Bulan' => $request->has('Bulan') ? $request->input('Bulan') : 0,
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'KaUnitId' => $request->has('KaUnitId') ? $request->input('KaUnitId') : $guidEmpty,
            'AgenId' => $request->has('AgenId') ? $request->input('AgenId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
    * GET REKAP PROGRESS PIPELINE RENEWAL PER KANAL
    */
    public function getRekapProgressPipelineRenewalPerKanal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportPipelineRenewalWebService',
            'method' => 'ProgressPipelineRenewalPerKanal'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Bulan' => $request->has('Bulan') ? $request->input('Bulan') : 0,
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'KaUnitId' => $request->has('KaUnitId') ? $request->input('KaUnitId') : $guidEmpty,
            'AgenId' => $request->has('AgenId') ? $request->input('AgenId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

     /**
    * GET PIPELINE RENEWAL PER BADAN USAHA
    */
    public function getPipelineRenewalPerBadanUsaha(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportPipelineRenewalWebService',
            'method' => 'PipelineRenewalPerBadanUsaha'
        ], 'POST', false, [
            'PageNumber' => $request->has('PageNumber') ? $request->input('PageNumber') : 0,
            'PageSize' => $request->has('PageSize') ? $request->input('PageSize') : 0,
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'StatusAktivitas' => $request->has('StatusAktivitas') ? $request->input('StatusAktivitas') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'KaUnitId' => $request->has('KaUnitId') ? $request->input('KaUnitId') : $guidEmpty,
            'AgenId' => $request->has('AgenId') ? $request->input('AgenId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

     /**
    * GET PIPELINE RENEWAL LAPSE
    */
    public function getPipelineRenewalLapse(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportPipelineRenewalWebService',
            'method' => 'PipelineRenewalLapse'
        ], 'POST', false, [
            'PageNumber' => $request->has('PageNumber') ? $request->input('PageNumber') : 0,
            'PageSize' => $request->has('PageSize') ? $request->input('PageSize') : 0,
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'KaUnitId' => $request->has('KaUnitId') ? $request->input('KaUnitId') : $guidEmpty,
            'AgenId' => $request->has('AgenId') ? $request->input('AgenId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
    * GET REKAP PIPELINE NEW BUSINESS PER BULAN
    */
    public function getRekapPipelinenNewBusinessPerBulan(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportPipelineNewBusinessWebService',
            'method' => 'RekapPipelineNewBusinessPerBulan'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'KaUnitId' => $request->has('KaUnitId') ? $request->input('KaUnitId') : $guidEmpty,
            'AgenId' => $request->has('AgenId') ? $request->input('AgenId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
    * GET REKAP PIPELINE NEW BUSINESS PER KANAL
    */
    public function getRekapPipelinenNewBusinessPerKanal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportPipelineNewBusinessWebService',
            'method' => 'RekapPipelineNewBusinessPerKanal'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'KaUnitId' => $request->has('KaUnitId') ? $request->input('KaUnitId') : $guidEmpty,
            'AgenId' => $request->has('AgenId') ? $request->input('AgenId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
    * GET DAFTAR PIPELINE NEW BUSINESS ALL PIPELINE
    */
    public function getPipelinenNewBusinessAllPipeline(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportPipelineNewBusinessWebService',
            'method' => 'DaftarPipelineNewBusinessAllPipeline'
        ], 'POST', false, [
            'PageNumber' => $request->has('PageNumber') ? $request->input('PageNumber') : 0,
            'PageSize' => $request->has('PageSize') ? $request->input('PageSize') : 0,
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'KaUnitId' => $request->has('KaUnitId') ? $request->input('KaUnitId') : $guidEmpty,
            'AgenId' => $request->has('AgenId') ? $request->input('AgenId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
    * GET DAFTAR PIPELINE NEW BUSINESS KOMITMEN
    */
    public function getPipelinenNewBusinessKomitmen(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportPipelineNewBusinessWebService',
            'method' => 'DaftarPipelineNewBusinessKomitmen'
        ], 'POST', false, [
            'PageNumber' => $request->has('PageNumber') ? $request->input('PageNumber') : 0,
            'PageSize' => $request->has('PageSize') ? $request->input('PageSize') : 0,
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'KaUnitId' => $request->has('KaUnitId') ? $request->input('KaUnitId') : $guidEmpty,
            'AgenId' => $request->has('AgenId') ? $request->input('AgenId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
    * GET DAFTAR PIPELINE NEW BUSINESS QUOTATION
    */
    public function getPipelinenNewBusinessQuotation(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportPipelineNewBusinessWebService',
            'method' => 'DaftarPipelineNewBusinessQuotation'
        ], 'POST', false, [
            'PageNumber' => $request->has('PageNumber') ? $request->input('PageNumber') : 0,
            'PageSize' => $request->has('PageSize') ? $request->input('PageSize') : 0,
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'KaUnitId' => $request->has('KaUnitId') ? $request->input('KaUnitId') : $guidEmpty,
            'AgenId' => $request->has('AgenId') ? $request->input('AgenId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

     /**
    * GET DAFTAR PIPELINE NEW BUSINESS CLOSING
    */
    public function getPipelinenNewBusinessClosing(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportPipelineNewBusinessWebService',
            'method' => 'PipelineNewBusinessClosing'
        ], 'POST', false, [
            'PageNumber' => $request->has('PageNumber') ? $request->input('PageNumber') : 0,
            'PageSize' => $request->has('PageSize') ? $request->input('PageSize') : 0,
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'KaUnitId' => $request->has('KaUnitId') ? $request->input('KaUnitId') : $guidEmpty,
            'AgenId' => $request->has('AgenId') ? $request->input('AgenId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
    * GET DAFTAR PIPELINE NEW BUSINESS LOSS
    */
    public function getPipelinenNewBusinessLoss(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportPipelineNewBusinessWebService',
            'method' => 'PipelineNewBusinessLoss'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'KaUnitId' => $request->has('KaUnitId') ? $request->input('KaUnitId') : $guidEmpty,
            'AgenId' => $request->has('AgenId') ? $request->input('AgenId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
    * GET PROGRESS PIPELINE NEW BUSINESS ALL PIPELINE
    */
    public function getProgressPipelinenNewBusinessAllPipeline(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportPipelineNewBusinessWebService',
            'method' => 'ProgressPipelineNewBusinessAllPipelinePerBulan'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Bulan' => $request->has('Bulan') ? $request->input('Bulan') : 0,
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'KaUnitId' => $request->has('KaUnitId') ? $request->input('KaUnitId') : $guidEmpty,
            'AgenId' => $request->has('AgenId') ? $request->input('AgenId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
    * GET PROGRESS PIPELINE NEW BUSINESS KOMITEMEN
    */
    public function getProgressPipelinenNewBusinessKomitemen(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportPipelineNewBusinessWebService',
            'method' => 'ProgressPipelineNewBusinessKomitenPerBulan'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Bulan' => $request->has('Bulan') ? $request->input('Bulan') : 0,
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'KaUnitId' => $request->has('KaUnitId') ? $request->input('KaUnitId') : $guidEmpty,
            'AgenId' => $request->has('AgenId') ? $request->input('AgenId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

     /**
    * GET PROGRESS PIPELINE NEW BUSINESS QUOTATION
    */
    public function getProgressPipelinenNewBusinessQuotation(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportPipelineNewBusinessWebService',
            'method' => 'ProgressPipelineNewBusinessQuotationPerBulan'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Bulan' => $request->has('Bulan') ? $request->input('Bulan') : 0,
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'KaUnitId' => $request->has('KaUnitId') ? $request->input('KaUnitId') : $guidEmpty,
            'AgenId' => $request->has('AgenId') ? $request->input('AgenId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
    * GET LEADING INDICATOR KA. UNIT
    */
    public function getLeadingIndicatorKaUnit(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportLeadingIndicatorWebService',
            'method' => 'LeadingIndicatorNewBusinessKanit'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanitId' => $request->has('KanitId') ? $request->input('KanitId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 

    }

    /**
    * GET LEADING INDICATOR AGEN
    */
    public function getLeadingIndicatorAgen(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportLeadingIndicatorWebService',
            'method' => 'LeadingIndicatorNewBusinessAgen'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanitId' => $request->has('KanitId') ? $request->input('KanitId') : $guidEmpty,
            'AgentId' => $request->has('AgentId') ? $request->input('AgentId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 

    }

     /**
    * GET REKAP GWP BU TOTAL
    */
    public function getRekapGwpBuTotal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportRekapitulasiGWPWebService',
            'method' => 'RekapGWPBuTotal'
        ], 'POST', false, [
            'PageNumber' => $request->has('PageNumber') ? $request->input('PageNumber') : 0,
            'PageSize' => $request->has('PageSize') ? $request->input('PageSize') : 0,
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 

    }

    /**
    * GET TARGET LEADING KANAL
    */
    public function getTargetLeadingKanal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportDaftarTargetServiceWebService',
            'method' => 'TargetLeadingKanal'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 

    }

    /**
    * GET PERFORMANCE AGEN
    */
    public function getPerformanceAgen(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportPerformanceAgenWebService',
            'method' => 'PerformanceAgen'
        ], 'POST', false, [
            'PageNumber' => $request->has('PageNumber') ? $request->input('PageNumber') : 0,
            'PageSize' => $request->has('PageSize') ? $request->input('PageSize') : 0,
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'KaUnitId' => $request->has('KaUnitId') ? $request->input('KaUnitId') : $guidEmpty,
            'AgenId' => $request->has('AgenId') ? $request->input('AgenId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 

    }

    /**
    * GET BU INFORCE
    */
    public function getBuInforce(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportBuInforceWebService',
            'method' => 'GetReportBuInforce'
        ], 'POST', false, [
            'PageNumber' => $request->has('PageNumber') ? $request->input('PageNumber') : 0,
            'PageSize' => $request->has('PageSize') ? $request->input('PageSize') : 0,
            'Bulan' => $request->has('Bulan') ? $request->input('Bulan') : 0,
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 

    }

     /**
    * GET TOP 10 BROKER
    */
    public function getTopBroker(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportBrokerServiceWebService',
            'method' => 'ReportBroker'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 

    }

        /**
     * GET FILTER KANAL DISTRIBUSI BU INFORCE
     */
    public function getFilterKanalDistribusi(Request $request, $isJSON = true)
    {
        $response = $this->restCreatio([
            'service' => 'ReportBuInforceWebService',
            'method' => 'GetKanalDistribusi'
        ], 'POST', false, [
            //parameter here
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
    * GET DAFTAR ACTUAL GWP
    */
    public function getDaftarActualGwp(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'ReportDaftarActualGwpWebService',
            'method' => 'DaftarActualGwp'
        ], 'POST', false, [
            'PageNumber' => $request->has('PageNumber') ? $request->input('PageNumber') : 0,
            'PageSize' => $request->has('PageSize') ? $request->input('PageSize') : 0,
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,

        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 

    }
}
