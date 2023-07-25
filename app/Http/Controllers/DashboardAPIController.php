<?php

namespace App\Http\Controllers;

use App\Services\CreatioService;
use App\Traits\CreatioHelperTrait;
use Illuminate\Http\Request;

class DashboardAPIController extends Controller
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
    * ======================================= FILTER DASHBOARD  =======================================
    */

    /**
     * GET FILTER KANAL DISTRIBUSI
     */
    public function getKanalDistribusiId(Request $request, $isJSON = true)
    {
        $response = $this->restCreatio([
            'service' => 'FilterDashboardWebService',
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
     * GET FILTER BULAN
     */
    public function getBulan(Request $request, $isJSON = true)
    {
        $response = $this->restCreatio([
            'service' => 'FilterDashboardWebService',
            'method' => 'GetBulan'
        ], 'POST', false, [
            //parameter here
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
     * GET FILTER PRODUK
     */
    public function getProduk(Request $request, $isJSON = true)
    {
        $response = $this->restCreatio([
            'service' => 'FilterDashboardWebService',
            'method' => 'GetProduk'
        ], 'POST', false, [
            //parameter here
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

      /**
     * GET FILTER POLIS STATUS
     */
    public function getPosisStatus(Request $request, $isJSON = true)
    {
        $response = $this->restCreatio([
            'service' => 'FilterDashboardWebService',
            'method' => 'GetPolisStatus'
        ], 'POST', false, [
            //parameter here
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
     * ==================================================================================================
     */

    /**
     * GET KANAL DISTRIBUSI
     */
    public function getKanalDistribusi(Request $request, $isJSON = true)
    {
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
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
    * GET TOTAL GWP
    */
    public function getTotalPencapaianGwp(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'TotalPencapaianGwp'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
     * GET TOTAL GWP NEW BUSINESS
     */
    public function getTotalGwpNewBusiness(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'TotalPencapaianGWPNewBusiness'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
     * GET TOTAL GWP RENEWAL
     */
    public function getTotalGwpRenewal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'TotalPencapaianGWPRenewal'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
     * GET PERFROMANCE GWP
     */
    public function getPerformanceGWP(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'PerformanceGWP'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
     * GET PERFORMANCE KANAL
     */
    public function getPerformanceKanal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'PerformanceKanal'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'PolisStatusId' => $request->has('PolisStatusId') ? $request->input('PolisStatusId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
     * GET PERFRORMANCE BY PRODUCT
     */
    public function getPerformanceByProduct(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'PerformanceByProduct'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'PolisStatusId' => $request->has('PolisStatusId') ? $request->input('PolisStatusId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
     * GET ARCHIEVEMENT BY SUMBER BISNIS
     */
    public function getArchievementBySumberBisnis(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'ArchievementBySumberBisnis'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
     * GET ARCHIEVEMENT BY PRODUK
     */
    public function getArchievementByProduk(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'KinerjaProduk'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'PolisStatusId' => $request->has('PolisStatusId') ? $request->input('PolisStatusId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
     * GET ARCHIEVEMENT BY DISTRIBUSI
     */
    public function getArchievementByKanalDistribusi(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'ArchievementByKanalDistribusi'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'PolisStatusId' => $request->has('PolisStatusId') ? $request->input('PolisStatusId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
     * GET PERFORMANCE BY KANAL
     */
    public function getPerformancePerKanal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'PerformancePerKanal'
        ], 'POST', false, [
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

     /**
     * GET TREND GWP PERBULAN
     */
    public function getTrendGwpPerBulan(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'RenewalVsNewBusiness'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
     /**
     * GET TREND GWP PER KEPEMILIKAN
     */
    public function getGwpPerKepemilikan(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'GwpPerKepemilikan'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

     /**
     * GET LIST GWP PER KEPEMILIKAN
     */
    public function getListGwpPerKepemilikan(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'ListGwpPerKepemilikan'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

     /**
     * GET LIST TOP 10 BU INFORCE
     */
    public function getTopBuInforce(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'ListBuInforce'
        ], 'POST', false, [
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

     /**
     * GET LIST LEADING INDICATOR
     */
    public function getLeadingIndicator(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'LeadingIndicatorNewBusinessKanal'
        ], 'POST', false, [
            'StartDate' => $request->has('StartDate') ? $request->input('StartDate') : "",
            'EndDate' => $request->has('EndDate') ? $request->input('EndDate') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
     * GET CHART PRODUK SHARE BY GWP
     */
    public function getChartShareProduk(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'ChartProdukShareByGwp'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
     * GET LIST SHARE PRODUK
     */
    public function getListShareProduk(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'ListProdukShareByGwp'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
     * GET CHART ANP PER KEPEMILIKAN
     */
    public function getChartAnpPerKepemilikan(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'ChartAnpPerKepemilikan'
        ], 'POST', false, [
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
     * GET LIST ANP PER KEPEMILIKAN
     */
    public function getListAnpPerKepemilikan(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'ListAnpPerKepemilikan'
        ], 'POST', false, [
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

     /**
     * GET CHART ANP PER SINERGI BANK MANDIRI
     */
    public function getChartAnpPerSinergiBankMandiri(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'ChartAnpPerSinergiBankMandiri'
        ], 'POST', false, [
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
     * GET LIST ANP PER SINERGI BANK MANDIRI
     */
    public function getListAnpPerSinergiBankMandiri(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'ListAnpPerSinergiBankMandiri'
        ], 'POST', false, [
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

     /**
     * GET CHART TOP ANP PER SEKTOR INDUSTRI
     */
    public function getChartAnpPerSektorIndustri(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'ChartAnpPerSektorIndustri'
        ], 'POST', false, [
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
     * GET LIST TOP 10 ANP PER SEKTOR INDUSTRI
     */
    public function getListAnpPerSektorIndustri(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'ListAnpPerSektorIndustri'
        ], 'POST', false, [
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

     /**
     * GET CHART LEADING PROPOSAL
     */
    public function getChartLeadingProposal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'LeadingProposal'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

     /**
     * GET CHART LEADING POLIS
     */
    public function getChartLeadingPolis(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'LeadingPolis'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

     /**
     * GET CHART LEADING ANP
     */
    public function getChartLeadingAnp(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'LeadingAnp'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

     /**
     * GET LIST LEADING PERKANAL
     */
    public function getListLeadingPerkanal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'PerformanceNasionalWebService',
            'method' => 'LeadingIndicatorPerKanal'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'Periode' => $request->has('Periode') ? $request->input('Periode') : "",
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'TipeId' => $request->has('TipeId') ? $request->input('TipeId') : $guidEmpty,
            'TargetId' => $request->has('TargetId') ? $request->input('TargetId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }









    /**
    * ======================================= QUOTATION DASHBOARD  =======================================
    */
    
    /**
    * GET QUOTATION ON PROGRESS
    */
    public function getTotalQuotationOnProgress(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardQuotationAPI',
            'method' => 'TotalQuotationOnProgress'
        ], 'POST', false, [
            'StartDate' => $request->has('StartDate') ? $request->input('StartDate') : "",
            'EndDate' => $request->has('EndDate') ? $request->input('EndDate') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
    * GET QUOTATION CLOSED WON
    */
    public function getTotalQuotationClosedWon(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardQuotationAPI',
            'method' => 'TotalQuotationClosedWon'
        ], 'POST', false, [
            'StartDate' => $request->has('StartDate') ? $request->input('StartDate') : "",
            'EndDate' => $request->has('EndDate') ? $request->input('EndDate') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
    * GET QUOTATION LOSS
    */
    public function getTotalQuotationLoss(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardQuotationAPI',
            'method' => 'TotalQuotationLoss'
        ], 'POST', false, [
            'StartDate' => $request->has('StartDate') ? $request->input('StartDate') : "",
            'EndDate' => $request->has('EndDate') ? $request->input('EndDate') : "", 
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
    * GET QUOTATION BY STATUS
    */
    public function getTotalQuotationByStataus(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardQuotationAPI',
            'method' => 'TotalQuotationByStataus'
        ], 'POST', false, [
            'StartDate' => $request->has('StartDate') ? $request->input('StartDate') : "",
            'EndDate' => $request->has('EndDate') ? $request->input('EndDate') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
    * GET QUOTATION BY TYPE
    */
    public function getTotalQuotationByType(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardQuotationAPI',
            'method' => 'TotalQuotationByType'
        ], 'POST', false, [
            'StartDate' => $request->has('StartDate') ? $request->input('StartDate') : "",
            'EndDate' => $request->has('EndDate') ? $request->input('EndDate') : "", 
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
    * GET QUOTATION BY SLA
    */
    public function getTotalQuotationBySLA(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardQuotationAPI',
            'method' => 'TotalQuotationBySLA'
        ], 'POST', false, [
            'StartDate' => $request->has('StartDate') ? $request->input('StartDate') : "",
            'EndDate' => $request->has('EndDate') ? $request->input('EndDate') : "", 
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
    * GET QUOTATION BY MONTH
    */
    public function getQuotationStatusByMonth(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardQuotationAPI',
            'method' => 'QuotationStatusByMonth'
        ], 'POST', false, [
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
    * GET QUOTATION LIST BY POLIS STATUS
    */
    public function getQuotationListByPolisStatus(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardQuotationAPI',
            'method' => 'QuotationListByPolisStatus'
        ], 'POST', false, [
            'StartDate' => $request->has('StartDate') ? $request->input('StartDate') : "",
            'EndDate' => $request->has('EndDate') ? $request->input('EndDate') : "", 
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
    * GET QUOTATION LIST BY TYPE
    */
    public function getQuotationListByType(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardQuotationAPI',
            'method' => 'QuotationListByType'
        ], 'POST', false, [
            'StartDate' => $request->has('StartDate') ? $request->input('StartDate') : "",
            'EndDate' => $request->has('EndDate') ? $request->input('EndDate') : "", 
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
    * GET QUOTATION LIST BY SLA
    */
    public function getQuotationListBySLA(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardQuotationAPI',
            'method' => 'QuotationListBySLA'
        ], 'POST', false, [
            'StartDate' => $request->has('StartDate') ? $request->input('StartDate') : "",
            'EndDate' => $request->has('EndDate') ? $request->input('EndDate') : "", 
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
    /**
    * GET QUOTATION LIST BY MONTH
    */
    public function getQuotationListByMonth(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardQuotationAPI',
            'method' => 'QuotationListByMonth'
        ], 'POST', false, [
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /**
     * =============================== DASHBOARD PIPELINE NEW BUSINESS =================================================
     */

    /**
     *  GET TOTAL PIPELINE KOMITMEN NEW BUSINESS
     */

    public function getTotalPipelineKomitmen(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineNewBusinessAPI',
            'method' => 'TotalPipelineKomitmen'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
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
    *  TOTAL PIPELINE QUOTATION NEW BUSINESS
    */

    public function getTotalPipelineQuotation(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineNewBusinessAPI',
            'method' => 'TotalPipelineQuotation'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /*
    * TOTAL PIPELINE CLOSING NEW BUSINESS
    */

    public function getTotalPipelineClosing(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineNewBusinessAPI',
            'method' => 'TotalPipelineClosing'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /*
    * TOTAL PIPELINE LOSS NEW BUSINESS
    */

    public function getTotalPipelineLoss(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineNewBusinessAPI',
            'method' => 'TotalPipelineLoss'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /*
    * TOTAL PIPELINE IN PROGRESS NEW BUSINESS
    */

    public function getTotalPipelineInProgress(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineNewBusinessAPI',
            'method' => 'TotalPipelineInProgress'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /*
    * TOTAL PIPELINE EXPIRED QUOTATION NEW BUSINESS
    */

    public function getTotalExpiredQuotation(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineNewBusinessAPI',
            'method' => 'TotalExpiredQuotation'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /*
    * CHART PIPELINE KOMITMEN NEW BUSINESS
    */
    public function getChartPipelineKomitmenNewBusinessByKanal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineNewBusinessAPI',
            'method' => 'PipelineKomitmenNewBusiness'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /*
    * CHART PIPELINE  BY PROGRESS NEW BUSINESS
    */

    public function getChartPipelineNewBusinessByProgress(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineNewBusinessAPI',
            'method' => 'PipelineByProgresNewBusiness'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /*
    * LIST PIPELINE  KOMITMEN NEW BUSINESS BY KANAL
    */
    public function getPipelineKomitmenNewBusinessByKanal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineNewBusinessAPI',
            'method' => 'PipelineKomitmenNewBusinessByKanal'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /*
    * LIST PIPELINE NEW BUSINESS BY PROGRESS
    */
    public function getPipelineNewBusinessByProgres(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineNewBusinessAPI',
            'method' => 'PipelineNewBusinessByProgres'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }


    /*
    * LIST TOP 10 BU KOMITMEN NEW BUSINESS
    */
    public function getListTopBuKomitmen(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineNewBusinessAPI',
            'method' => 'TopBuKomitmenNewBusiness'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /*
    * LIST TOP 10 BU QUOTATION NEW BUSINESS
    */
    public function getListTopBuQuotation(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineNewBusinessAPI',
            'method' => 'TopBuQuotationNewBusiness'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }


    /*
    * LIST TOP 10 BU CLOSING NEW BUSINESS
    */
    public function getListTopBuClosing(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineNewBusinessAPI',
            'method' => 'TopBuClosingNewBusiness'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /*
    * LIST TOP 10 BU LOSS NEW BUSINESS
    */
    public function getListTopBuLoss(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineNewBusinessAPI',
            'method' => 'TopBuLossNewBusiness'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /*
    * LIST TOP 10 BU EXPIRED QUOTATION NEW BUSINESS
    */
    public function getListTopBuInProgress(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineNewBusinessAPI',
            'method' => 'TopBuInProgressNewBusiness'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /*
    * LIST TOP 10 BU INPROGRESS NEW BUSINESS
    */
    public function getListTopBuExpiredQuotation(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineNewBusinessAPI',
            'method' => 'TopBuExpiredQuotationNewBusiness'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
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
    * =============================== DASHBOARD PIPELINE RENEWAL =================================================
    */

    /*
    * TOTAL PIPELINE CLOSING RENEWAL
    */

    public function getTotalPipelineClosingRenewal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineRenewalAPI',
            'method' => 'TotalPipelineClosing'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /*
    * TOTAL PIPELINE LAPSE RENEWAL
    */

    public function getTotalPipelineLapseRenewal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineRenewalAPI',
            'method' => 'TotalPipelineLapse'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /*
    * TOTAL PIPELINE IN PROGRESS RENEWAL
    */

    public function getTotalPipelineInProgressRenewal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineRenewalAPI',
            'method' => 'TotalPipelineInProgress'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /*
    * LIST TOP 10 BU CLOSING RENEWAL
    */
    public function getListTopBuClosingRenewal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineRenewalAPI',
            'method' => 'TopBuClosingRenewal'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /*
    * LIST TOP 10 BU LAPSE RENEWAL
    */
    public function getListTopBuLapseRenewal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineRenewalAPI',
            'method' => 'TopBuLapseRenewal'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }

    /*
    * LIST TOP 10 BU IN PROGRESS RENEWAL
    */
    public function getListTopBuInProgressRenewal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineRenewalAPI',
            'method' => 'TopBuInProgressRenewal'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
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
     * CHART PIPELINE BY PROGRESS RENEWAL
     */
    public function getChartPipelineRenewalByProgress(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineRenewalAPI',
            'method' => 'ChartPipelineByProgresRenewal'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
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
     * LIST PIPELINE BY PROGRESS RENEWAL
     */
    public function getListPipelineRenewalByProgress(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineRenewalAPI',
            'method' => 'ListPipelineByProgresRenewal'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
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
     * LIST REKAP PIPELINE RENEWAL
     */
    public function getListRekapPipelineRenewal(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineRenewalAPI',
            'method' => 'RekapPipelineRenewal'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
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
     * LIST REKAP PIPELINE NEW BUSINESS
     */
    public function getListRekapPipelineNewBusiness(Request $request, $isJSON = true)
    {
        $guidEmpty = "00000000-0000-0000-0000-000000000000";
        $response = $this->restCreatio([
            'service' => 'CustomDashboardPipelineNewBusinessAPI',
            'method' => 'RekapPipelineNewBusiness'
        ], 'POST', false, [
            'Tahun' => $request->has('Tahun') ? $request->input('Tahun') : "",
            'KanalDistribusiId' => $request->has('KanalDistribusiId') ? $request->input('KanalDistribusiId') : $guidEmpty,
            'BulanId' => $request->has('BulanId') ? $request->input('BulanId') : $guidEmpty,
            'ProdukId' => $request->has('ProdukId') ? $request->input('ProdukId') : $guidEmpty,
        ]);
        
        if($isJSON) {
            return $response->Success ? response()->json($response->Response) : response()->json($response);
        }
        
        return $response->Success ? $response->Response : $response; 
    }
}
