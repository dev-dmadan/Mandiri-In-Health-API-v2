<?php

use App\Http\Controllers\DashboardAPIController;
use App\Http\Controllers\IntegrationController;
use App\Http\Controllers\ReportAPIController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/view/performanceNasional', function () {
        return view('dashboard/performanceNasional');
    });
    
    Route::get('/view/performanceNasional/{id}', function () {
        return view('dashboard/performanceNasional');
    });
    
    Route::get('/view/quotationDashboard', function () {
        return view('dashboard/quotationDashboard');
    });
    
    Route::get('/view/pipelineNewBusinessDashboard', function () {
        return view('dashboard/pipelineNewBusinessDashbord');
    });
    
    Route::get('/view/pipelineRenewalDashboard', function () {
        return view('dashboard/pipelineRenewalDashboard');
    });
    
    Route::get('/view/pipelineNewBusinessDashboardKanal/{KanalDistribusiId}', function () {
        return view('dashboard/pipelineNewBusinessDashbordKanal');
    });
    
    Route::get('/view/pipelineRenewalDashboardKanal/{KanalDistribusiId}', function () {
        return view('dashboard/pipelineRenewalDashboardKanal');
    });

    Route::group(['prefix' => 'api'], function () {
        Route::post('get-kanal-distribusi',  [DashboardAPIController::class, 'getKanalDistribusi']);
        Route::post('get-total-pencapaian-gwp',  [DashboardAPIController::class, 'getTotalPencapaianGwp']);
        Route::post('get-total-gwp-newbusiness',  [DashboardAPIController::class, 'getTotalGwpNewBusiness']);
        Route::post('get-total-gwp-renewal',  [DashboardAPIController::class, 'getTotalGwpRenewal']);
        Route::post('get-performance-gwp',  [DashboardAPIController::class, 'getPerformanceGWP']);
        Route::post('get-performance-kanal',  [DashboardAPIController::class, 'getPerformanceKanal']);
        Route::post('get-performance-by-product',  [DashboardAPIController::class, 'getPerformanceByProduct']);
        Route::post('get-archievement-by-sumber-bisnis',  [DashboardAPIController::class, 'getArchievementBySumberBisnis']);
        Route::post('get-archievement-by-product',  [DashboardAPIController::class, 'getArchievementByProduk']);
        Route::post('get-archievement-by-kanal-distribusi',  [DashboardAPIController::class, 'getArchievementByKanalDistribusi']);
        Route::post('get-performance-by-kanal',  [DashboardAPIController::class, 'getPerformancePerKanal']);
        Route::post('get-trend-gwp-per-bulan',  [DashboardAPIController::class, 'getTrendGwpPerBulan']);
        Route::post('get-trend-gwp-per-kepemilikan',  [DashboardAPIController::class, 'getGwpPerKepemilikan']);
        Route::post('get-list-gwp-per-kepemilikan',  [DashboardAPIController::class, 'getListGwpPerKepemilikan']);
        Route::post('get-list-top-bu-inforce',  [DashboardAPIController::class, 'getTopBuInforce']);
        Route::post('get-list-leading-indicator',  [DashboardAPIController::class, 'getLeadingIndicator']);
        Route::post('get-chart-share-produk',  [DashboardAPIController::class, 'getChartShareProduk']);
        Route::post('get-list-share-produk',  [DashboardAPIController::class, 'getListShareProduk']);
        Route::post('get-chart-anp-per-kepemilikan',  [DashboardAPIController::class, 'getChartAnpPerKepemilikan']);
        Route::post('get-list-anp-per-kepemilikan',  [DashboardAPIController::class, 'getListAnpPerKepemilikan']);
        Route::post('get-chart-anp-per-sinergi-bank-mandiri',  [DashboardAPIController::class, 'getChartAnpPerSinergiBankMandiri']);
        Route::post('get-list-anp-per-sinergi-bank-mandiri',  [DashboardAPIController::class, 'getListAnpPerSinergiBankMandiri']);
        Route::post('get-chart-anp-per-sektor-industri',  [DashboardAPIController::class, 'getChartAnpPerSektorIndustri']);
        Route::post('get-list-anp-per-sektor-industri',  [DashboardAPIController::class, 'getListAnpPerSektorIndustri']);
        Route::post('get-chart-leading-proposal',  [DashboardAPIController::class, 'getChartLeadingProposal']);
        Route::post('get-chart-leading-polis',  [DashboardAPIController::class, 'getChartLeadingPolis']);
        Route::post('get-chart-leading-anp',  [DashboardAPIController::class, 'getChartLeadingAnp']);
        Route::post('get-chart-leading-anp',  [DashboardAPIController::class, 'getChartLeadingAnp']);
        Route::post('get-list-leading-perkanal',  [DashboardAPIController::class, 'getListLeadingPerkanal']);

        Route::post('get-total-quotation-on-progress',  [DashboardAPIController::class, 'getTotalQuotationOnProgress']);
        Route::post('get-total-quotation-close-won',  [DashboardAPIController::class, 'getTotalQuotationClosedWon']);
        Route::post('get-total-quotation-loss',  [DashboardAPIController::class, 'getTotalQuotationLoss']);
        Route::post('get-total-quotation-by-status',  [DashboardAPIController::class, 'getTotalQuotationByStataus']);
        Route::post('get-total-quotation-by-type',  [DashboardAPIController::class, 'getTotalQuotationByType']);
        Route::post('get-total-quotation-by-sla',  [DashboardAPIController::class, 'getTotalQuotationBySLA']);
        Route::post('get-quotation-status-by-month',  [DashboardAPIController::class, 'getQuotationStatusByMonth']);
        Route::post('get-quotation-list-by-polis',  [DashboardAPIController::class, 'getQuotationListByPolisStatus']);
        Route::post('get-quotation-list-by-type',  [DashboardAPIController::class, 'getQuotationListByType']);
        Route::post('get-quotation-list-by-sla',  [DashboardAPIController::class, 'getQuotationListBySLA']);
        Route::post('get-quotation-list-by-month',  [DashboardAPIController::class, 'getQuotationListByMonth']);
        Route::post('report-get-kanal-distribusi',  [ReportAPIController::class, 'getKanalDistribusi']);
        Route::post('report-get-product',  [ReportAPIController::class, 'getProuct']);
        Route::post('report-get-perkiraan-Closing',  [ReportAPIController::class, 'getPerkiraanClosing']);
        Route::post('report-get-month',  [ReportAPIController::class, 'getMonth']);
        Route::post('report-get-target',  [ReportAPIController::class, 'getTarget']);
        Route::post('report-get-kanit',  [ReportAPIController::class, 'getKaKanit']);
        Route::post('report-get-kakanal',  [ReportAPIController::class, 'getKaKanal']);
        Route::post('report-get-agen',  [ReportAPIController::class, 'getAgen']);
        Route::post('report-get-tipe-kinerja',  [ReportAPIController::class, 'getTipeKinerja']);
        Route::post('report-get-filter-kanal-bu-inforce',  [ReportAPIController::class, 'getFilterKanalDistribusi']);
        Route::post('report-get-laporan-gwp',  [ReportAPIController::class, 'getLaporanGWP']);
        Route::post('report-get-actual-per-kanal',  [ReportAPIController::class, 'getActualPerKanal']);
        Route::post('report-get-kinerja-bisnis',  [ReportAPIController::class, 'getKinerjaBisnis']);
        Route::post('report-get-kinerja-bisnis-per-kanal',  [ReportAPIController::class, 'getKinerjaBisnisPerKanal']);
        Route::post('report-get-kinerja-product',  [ReportAPIController::class, 'getKinerjaProduct']);
        Route::post('report-get-kinerja-product-per-kanal',  [ReportAPIController::class, 'getKinerjaProductPerKanal']);
        Route::post('report-get-kinerja-ka-kpm',  [ReportAPIController::class, 'getKinerjaKAKPM']);
        Route::post('report-get-kinerja-ka-unit',  [ReportAPIController::class, 'getKinerjaKAUnit']);
        Route::post('report-get-kinerja-agen',  [ReportAPIController::class, 'getKinerjaAgen']);
        Route::post('report-get-kinerja-perbulan-kanal',  [ReportAPIController::class, 'getKinerjaPerbulanKanal']);
        Route::post('report-get-kinerja-perbulan-kanit',  [ReportAPIController::class, 'getKinerjaPerbulanKanit']);
        Route::post('report-get-kinerja-perbulan-agen',  [ReportAPIController::class, 'getKinerjaPerbulanAgen']);
        Route::post('report-get-actual-produk',  [ReportAPIController::class, 'getActualPerProduk']);
        Route::post('report-get-leading-indicator-kanal',  [ReportAPIController::class, 'getLeadingIndicatorKanal']);
        Route::post('report-get-leading-indicator-kanal-perbulan',  [ReportAPIController::class, 'getLeadingIndicatorKanalPerbulan']);
        Route::post('report-get-leading-indicator-agen',  [ReportAPIController::class, 'getLeadingIndicatorAgen']);
        Route::post('report-get-leading-indicator-agen-perbulan',  [ReportAPIController::class, 'getLeadingIndicatorAgenPerbulan']);
        Route::post('report-get-kinerja-produk-per-agen',  [ReportAPIController::class, 'getKinerjaProdukPerAgen']);
        Route::post('report-get-kinerja-peroduk-per-kanit',  [ReportAPIController::class, 'getKinerjaProdukPerKanit']);
        Route::post('report-get-rekap-gwp-badan-usaha',  [ReportAPIController::class, 'getRekapGwpBadanUsaha']);
        Route::post('report-get-target-per-kanal',  [ReportAPIController::class, 'getTargetPerKanal']);
        Route::post('report-get-target-per-produk',  [ReportAPIController::class, 'getTargetProduk']);
        Route::post('report-get-actual-proposal-per-kanal',  [ReportAPIController::class, 'getActualProposalPerKanal']);
        Route::post('report-get-actual-proposal-per-bulan',  [ReportAPIController::class, 'getActualProposalPerBulan']);
        Route::post('report-get-actual-anp-per-kanal',  [ReportAPIController::class, 'getActualPolisAnpPerKanal']);
        Route::post('report-get-actual-anp-per-bulan',  [ReportAPIController::class, 'getActualPolisAnpPerBulan']);
        Route::post('report-get-daftar-proposal',  [ReportAPIController::class, 'getDaftarProposal']);
        Route::post('report-get-daftar-polis-anp',  [ReportAPIController::class, 'getDaftarPolisAnp']);
        Route::post('report-get-rekap-progress-pepeline-renewal-perbulan',  [ReportAPIController::class, 'getRekapProgressPipelineRenewalPerBulan']);
        Route::post('report-get-rekap-progress-pepeline-renewal-perkanal',  [ReportAPIController::class, 'getRekapProgressPipelineRenewalPerKanal']);
        Route::post('report-get-pipeline-renewal-per-badan-usaha',  [ReportAPIController::class, 'getPipelineRenewalPerBadanUsaha']);
        Route::post('report-get-pipeline-renewal-lapse',  [ReportAPIController::class, 'getPipelineRenewalLapse']);
        Route::post('report-get-rekap-pipeline-newbusiness-per-bulan',  [ReportAPIController::class, 'getRekapPipelinenNewBusinessPerBulan']);
        Route::post('report-get-rekap-pipeline-newbusiness-per-kanal',  [ReportAPIController::class, 'getRekapPipelinenNewBusinessPerKanal']);
        Route::post('report-get-pipeline-newbusiness-all-pipeline',  [ReportAPIController::class, 'getPipelinenNewBusinessAllPipeline']);
        Route::post('report-get-pipeline-newbusiness-komitmen',  [ReportAPIController::class, 'getPipelinenNewBusinessKomitmen']);
        Route::post('report-get-pipeline-newbusiness-quotation',  [ReportAPIController::class, 'getPipelinenNewBusinessQuotation']);
        Route::post('report-get-pipeline-newbusiness-closing',  [ReportAPIController::class, 'getPipelinenNewBusinessClosing']);
        Route::post('report-get-pipeline-newbusiness-loss',  [ReportAPIController::class, 'getPipelinenNewBusinessLoss']);
        Route::post('report-get-progress-pipeline-newbusiness-all-pipeline',  [ReportAPIController::class, 'getProgressPipelinenNewBusinessAllPipeline']);
        Route::post('report-get-progress-pipeline-newbusiness-komitemen',  [ReportAPIController::class, 'getProgressPipelinenNewBusinessKomitemen']);
        Route::post('report-get-progress-pipeline-newbusiness-quotation',  [ReportAPIController::class, 'getProgressPipelinenNewBusinessQuotation']);
        Route::post('report-get-leading-indicator-kanit',  [ReportAPIController::class, 'getLeadingIndicatorKaUnit']);
        Route::post('report-get-rekap-gwp-bu-total',  [ReportAPIController::class, 'getRekapGwpBuTotal']);
        Route::post('report-get-target-leding-kanal',  [ReportAPIController::class, 'getTargetLeadingKanal']);
        Route::post('report-get-performance-agen',  [ReportAPIController::class, 'getPerformanceAgen']);
        Route::post('report-get-bu-inforce',  [ReportAPIController::class, 'getBuInforce']);
        Route::post('report-get-top-broker',  [ReportAPIController::class, 'getTopBroker']);
        Route::post('report-get-daftar-actual-gwp',  [ReportAPIController::class, 'getDaftarActualGwp']);
        Route::post('dashboard-get-kanal-distribusi',  [DashboardAPIController::class, 'getKanalDistribusiId']);
        Route::post('dashboard-get-produk',  [DashboardAPIController::class, 'getProduk']);
        Route::post('dashboard-get-bulan',  [DashboardAPIController::class, 'getBulan']);
        Route::post('dashboard-get-polis-status',  [DashboardAPIController::class, 'getPosisStatus']);
        Route::post('get-total-pipeline-komitmen',  [DashboardAPIController::class, 'getTotalPipelineKomitmen']);
        Route::post('get-total-pipeline-quotation',  [DashboardAPIController::class, 'getTotalPipelineQuotation']);
        Route::post('get-total-pipeline-closing',  [DashboardAPIController::class, 'getTotalPipelineClosing']);
        Route::post('get-total-pipeline-loss',  [DashboardAPIController::class, 'getTotalPipelineLoss']);
        Route::post('get-total-pipeline-inprogress',  [DashboardAPIController::class, 'getTotalPipelineInProgress']);
        Route::post('get-total-pipeline-expired-quotation',  [DashboardAPIController::class, 'getTotalExpiredQuotation']);
        Route::post('get-list-pipeline-komitmen-kanal',  [DashboardAPIController::class, 'getPipelineKomitmenNewBusinessByKanal']);
        Route::post('get-list-pipeline-progress',  [DashboardAPIController::class, 'getPipelineNewBusinessByProgres']);
        Route::post('get-chart-pipeline-komitmen-kanal',  [DashboardAPIController::class, 'getChartPipelineKomitmenNewBusinessByKanal']);
        Route::post('get-chart-pipeline-progress',  [DashboardAPIController::class, 'getChartPipelineNewBusinessByProgress']);
        Route::post('get-list-top-bu-komitmen',  [DashboardAPIController::class, 'getListTopBuKomitmen']);
        Route::post('get-list-top-bu-quotation',  [DashboardAPIController::class, 'getListTopBuQuotation']);
        Route::post('get-list-top-bu-closing',  [DashboardAPIController::class, 'getListTopBuClosing']);
        Route::post('get-list-top-bu-loss',  [DashboardAPIController::class, 'getListTopBuLoss']);
        Route::post('get-list-top-bu-inprogress',  [DashboardAPIController::class, 'getListTopBuInProgress']);
        Route::post('get-list-top-bu-expired-quotation',  [DashboardAPIController::class, 'getListTopBuExpiredQuotation']);
        Route::post('get-list-rekap-pipeline-newbusiness',  [DashboardAPIController::class, 'getListRekapPipelineNewBusiness']);
        Route::post('get-total-pipeline-closing-renewal',  [DashboardAPIController::class, 'getTotalPipelineClosingRenewal']);
        Route::post('get-total-pipeline-lapse-renewal',  [DashboardAPIController::class, 'getTotalPipelineLapseRenewal']);
        Route::post('get-total-pipeline-inprogress-renewal',  [DashboardAPIController::class, 'getTotalPipelineInProgressRenewal']);
        Route::post('get-list-top-bu-closing-renewal',  [DashboardAPIController::class, 'getListTopBuClosingRenewal']);
        Route::post('get-list-top-bu-lapse-renewal',  [DashboardAPIController::class, 'getListTopBuLapseRenewal']);
        Route::post('get-list-top-bu-inprogress-renewal',  [DashboardAPIController::class, 'getListTopBuInProgressRenewal']);
        Route::post('get-chart-pipeline-by-progress-renewal',  [DashboardAPIController::class, 'getChartPipelineRenewalByProgress']);
        Route::post('get-list-pipeline-by-progress-renewal',  [DashboardAPIController::class, 'getListPipelineRenewalByProgress']);
        Route::post('get-list-rekap-pipeline-renewal',  [DashboardAPIController::class, 'getListRekapPipelineRenewal']);
    });
});

Route::group(['prefix' => 'report'], function () {
    Route::get('/view/pusat', function () {
        $id = null;
        return view('report/listReportPusat', compact(['id']));
    });
    
    Route::get('/view/mtd', function () {
        return view('report/mtd');
    });
    
    Route::get('/view/reportActualPerProduk', function () {
        return view('report/PerformanceActualPerProduk');
    });
    
    Route::get('/view/reportActualPerKanal', function () {
        return view('report/PerformanceActualPerKanal');
    });
    
    Route::get('/view/reportLaporanGWP', function () {
        return view('report/PerformanceLaporanGWP ');
    });
    
    Route::get('/view/reportKinerjaBisnis', function () {
        return view('report/PerformanceKinerjaBisnis');
    });
    
    Route::get('/view/reportKinerjaBisnisPerKanal', function () {
        return view('report/PerformanceKinerjaBisnisPerKanal');
    });
    
    Route::get('/view/reportKinerjaProdukPerKanal', function () {
        return view('report/PerformanceKinerjaProdukPerKanal');
    });
    
    Route::get('/view/reportKinerjaProduk', function () {
        return view('report/PerformanceKinerjaProduk');
    });
    
    Route::get('/view/reportKinerjaPerBulanKanal', function () {
        return view('report/PerformanceKinerjaPerBulanKanal');
    });
    
    Route::get('/view/reportLeadingIndicatorKanal', function () {
        return view('report/PerformanceLeadingIndicatorKanal');
    });
    
    Route::get('/view/reportLeadingIndicatorKanalPerBulan', function () {
        return view('report/PerformanceLeadingIndicatorKanalPerBulan');
    });
    
    Route::get('/view/reportTargetLeading', function () {
        return view('report/performanceTargetLeadingImpor');
    });
    
    Route::get('/view/reportDaftarBuInforce', function () {
        return view('report/performanceDaftarBuInforce');
    });
    
    Route::get('/view/performanceDaftarActualGWPPerBulan', function () {
        return view('report/performanceDaftarActualGWPPerBulan');
    });
    
    Route::get('/view/performanceRekapGWPBU', function () {
        return view('report/performanceRekapGWPBU');
    });
    
    Route::get('/view/performanceRekapGWPBUTotal', function () {
        return view('report/performanceRekapGWPBUTotal');
    });
    
    Route::get('/view/performanceActualProposalPerKanal', function () {
        return view('report/performanceActualProposalPerKanal');
    });
    
    Route::get('/view/performanceActualProposalPerBulan', function () {
        return view('report/performanceActualProposalPerBulan');
    });
    
    Route::get('/view/performanceActualPolisANPKanal', function () {
        return view('report/performanceActualPolisANPKanal');
    });
    
    Route::get('/view/performanceActualPolisANPBulan', function () {
        return view('report/performanceActualPolisANPBulan');
    });
    
    Route::get('/view/performanceDaftarProposal', function () {
        return view('report/performanceDaftarProposal');
    });
    
    Route::get('/view/performanceDaftarPolisANP', function () {
        return view('report/performanceDaftarPolisANP');
    });
    
    Route::get('/view/performanceTargetKanalImpor', function () {
        return view('report/performanceTargetKanalImpor');
    });
    
    Route::get('/view/performanceTargetProdukImpor', function () {
        return view('report/performanceTargetProdukImpor');
    });

    Route::get('/view/diklat', function () {
        $id = null;
        return view('report/listReportDiklat', compact(['id']));
    });
    
    Route::get('/view/reportKinerjaAgenPerProduk', function () {
        return view('report/diklatkinerjaAgenPerProduk');
    });
    
    Route::get('/view/reportKinerjaKaUnitPerProduk', function () {
        return view('report/diklatkinerjaKaUnitPerProduk');
    });
    
    Route::get('/view/reportKinerjaPerBulanKanit', function () {
        return view('report/diklatkinerjaPerBulanKanit');
    });
    
    Route::get('/view/reportKinerjaPerBulanAgen', function () {
        return view('report/diklatkinerjaPerBulanAgen');
    });
    
    Route::get('/view/leadingIndicatorKAUnit', function () {
        return view('report/diklatleadingIndicatorKAUnit');
    });
    
    Route::get('/view/performanceAgen', function () {
        return view('report/diklatperformanceAgen');
    });
    
    Route::get('/view/reportLeadingIndicatorAgenPerBulan', function () {
        return view('report/diklatleadingIndicatorAgenPerBulan');
    });
    
    Route::get('/view/reportLeadingIndicatorKanitPerBulan', function () {
        return view('report/diklatleadingIndicatorKAUnit');
    });
    
    Route::get('/view/reportLeadingIndicatorAgen', function () {
        return view('report/diklatleadingIndicatorAgen');
    });
    
    Route::get('/view/reportTopTenGWPBroker', function () {
        return view('report/diklatreportTopTenGWPBroker');
    });

    Route::get('/view/pipeline', function () {
        $id = null;
        return view('report/listReportPipeline',compact(['id']));
    });
    
    Route::get('/view/pipelineRNDaftarLapse', function () {
        return view('report/pipelineRNDaftarLapse');
    });
    Route::get('/view/pipelineRNRekapPerBulan', function () {
        return view('report/pipelineRNRekapPerBulan');
    });
    Route::get('/view/pipelineRNRekapPerKanal', function () {
        return view('report/pipelineRNRekapPerKanal');
    });
    Route::get('/view/pipelineRNDaftarPerBU', function () {
        return view('report/pipelineRNDaftarPerBU');
    });
    
    Route::get('/view/pipelineNBDaftarWin', function () {
        return view('report/pipelineNBDaftarWin');
    });
    Route::get('/view/pipelineNBDaftarLoss', function () {
        return view('report/pipelineNBDaftarLoss');
    });
    Route::get('/view/pipelineNBDaftarAllPipeline', function () {
        return view('report/pipelineNBDaftarAllPipeline');
    });
    Route::get('/view/pipelineNBDaftarPipelineQuotation', function () {
        return view('report/pipelineNBDaftarPipelineQuotation');
    });
    Route::get('/view/pipelineNBDaftarPipelineKomitment', function () {
        return view('report/pipelineNBDaftarPipelineKomitment');
    });
    Route::get('/view/pipelineNBRekapPerBulan', function () {
        return view('report/pipelineNBRekapPerBulan');
    });
    Route::get('/view/pipelineNBRekapPerKanal', function () {
        return view('report/pipelineNBRekapPerKanal');
    });
    Route::get('/view/pipelineNBRekapProgressAllPipeline', function () {
        return view('report/pipelineNBRekapProgressAllPipeline');
    });
    Route::get('/view/pipelineNBRekapProgressPipelineKomitment', function () {
        return view('report/pipelineNBRekapProgressPipelineKomitment');
    });
    Route::get('/view/pipelineNBRekapProgressPipelineQuotation', function () {
        return view('report/pipelineNBRekapProgressPipelineQuotation');
    });

    Route::get('/view/pusat/{id}', function ($id) {
        // $url = URL::full();
        // $segment = explode('/', $url)[5];
        // dd($id);
        return view('report/listReportPusat', compact(['id']));
    });
    
    Route::get('/view/reportActualPerProduk/{id}', function ($id) {
        return view('report/PerformanceActualPerProduk');
    });
    
    Route::get('/view/reportActualPerKanal/{id}', function ($id) {
        return view('report/PerformanceActualPerKanal');
    });
    
    Route::get('/view/reportLaporanGWP/{id}', function ($id) {
        return view('report/PerformanceLaporanGWP ');
    });
    
    Route::get('/view/reportKinerjaBisnis/{id}', function ($id) {
        dd($id);
        return view('report/PerformanceKinerjaBisnis', compact(['id']));
    });
    
    Route::get('/view/reportKinerjaBisnis/{id}', function ($id) {
        // dd($id);
        return view('report/PerformanceKinerjaBisnis');
    });
    
    Route::get('/view/reportKinerjaBisnisPerKanal/{id}', function ($id) {
        return view('report/PerformanceKinerjaBisnisPerKanal');
    });
    
    Route::get('/view/reportKinerjaProdukPerKanal/{id}', function ($id) {
        return view('report/PerformanceKinerjaProdukPerKanal');
    });
    
    Route::get('/view/reportKinerjaProduk/{id}', function ($id) {
        return view('report/PerformanceKinerjaProduk');
    });
    
    Route::get('/view/reportKinerjaPerBulanKanal/{id}', function ($id) {
        return view('report/PerformanceKinerjaPerBulanKanal');
    });
    
    Route::get('/view/reportLeadingIndicatorKanal/{id}', function ($id) {
        return view('report/PerformanceLeadingIndicatorKanal');
    });
    
    Route::get('/view/reportLeadingIndicatorKanalPerBulan/{id}', function ($id) {
        return view('report/PerformanceLeadingIndicatorKanalPerBulan');
    });
    
    Route::get('/view/reportTargetLeading/{id}', function ($id) {
        return view('report/performanceTargetLeadingImpor');
    });
    
    Route::get('/view/reportDaftarBuInforce/{id}', function ($id) {
        return view('report/performanceDaftarBuInforce');
    });
    
    Route::get('/view/performanceDaftarActualGWPPerBulan/{id}', function ($id) {
        return view('report/performanceDaftarActualGWPPerBulan');
    });
    
    Route::get('/view/performanceRekapGWPBU/{id}', function ($id) {
        return view('report/performanceRekapGWPBU');
    });
    
    Route::get('/view/performanceRekapGWPBUTotal/{id}', function ($id) {
        return view('report/performanceRekapGWPBUTotal');
    });
    
    Route::get('/view/performanceActualProposalPerKanal/{id}', function ($id) {
        return view('report/performanceActualProposalPerKanal');
    });
    
    Route::get('/view/performanceActualProposalPerBulan/{id}', function ($id) {
        return view('report/performanceActualProposalPerBulan');
    });
    
    Route::get('/view/performanceActualPolisANPKanal/{id}', function ($id) {
        return view('report/performanceActualPolisANPKanal');
    });
    
    Route::get('/view/performanceActualPolisANPBulan/{id}', function ($id) {
        return view('report/performanceActualPolisANPBulan');
    });
    
    Route::get('/view/performanceDaftarProposal/{id}', function ($id) {
        return view('report/performanceDaftarProposal');
    });
    
    Route::get('/view/performanceDaftarPolisANP/{id}', function ($id) {
        return view('report/performanceDaftarPolisANP');
    });
    
    Route::get('/view/performanceTargetKanalImpor/{id}', function ($id) {
        return view('report/performanceTargetKanalImpor');
    });
    
    Route::get('/view/performanceTargetProdukImpor/{id}', function ($id) {
        return view('report/performanceTargetProdukImpor');
    });

    Route::get('/view/diklat/{id}', function ($id) {
        return view('report/listReportDiklat', compact(['id']));
    });
    
    Route::get('/view/reportKinerjaAgenPerProduk/{id}', function ($id) {
        return view('report/diklatkinerjaAgenPerProduk');
    });
    
    Route::get('/view/reportKinerjaKaUnitPerProduk/{id}', function ($id) {
        return view('report/diklatkinerjaKaUnitPerProduk');
    });
    
    Route::get('/view/reportKinerjaPerBulanKanit/{id}', function ($id) {
        return view('report/diklatkinerjaPerBulanKanit');
    });
    
    Route::get('/view/reportKinerjaPerBulanAgen/{id}', function ($id) {
        return view('report/diklatkinerjaPerBulanAgen');
    });
    
    Route::get('/view/leadingIndicatorKAUnit/{id}', function ($id) {
        return view('report/diklatleadingIndicatorKAUnit');
    });
    
    Route::get('/view/performanceAgen/{id}', function ($id) {
        return view('report/diklatperformanceAgen');
    });
    
    Route::get('/view/reportLeadingIndicatorAgenPerBulan/{id}', function ($id) {
        return view('report/diklatleadingIndicatorAgenPerBulan');
    });
    
    Route::get('/view/reportLeadingIndicatorKanitPerBulan/{id}', function ($id) {
        return view('report/diklatleadingIndicatorKAUnit');
    });
    
    Route::get('/view/reportLeadingIndicatorAgen/{id}', function ($id) {
        return view('report/diklatleadingIndicatorAgen');
    });
    
    Route::get('/view/reportTopTenGWPBroker/{id}', function ($id) {
        return view('report/diklatreportTopTenGWPBroker');
    });

    Route::get('/view/pipeline/{id}', function ($id) {
        return view('report/listReportPipeline', compact(['id']));
    });
    
    Route::get('/view/pipelineRNDaftarLapse/{id}', function ($id) {
        return view('report/pipelineRNDaftarLapse');
    });
    Route::get('/view/pipelineRNRekapPerBulan/{id}', function ($id) {
        return view('report/pipelineRNRekapPerBulan');
    });
    Route::get('/view/pipelineRNRekapPerKanal/{id}', function ($id) {
        return view('report/pipelineRNRekapPerKanal');
    });
    Route::get('/view/pipelineRNDaftarPerBU/{id}', function ($id) {
        return view('report/pipelineRNDaftarPerBU');
    });
    
    Route::get('/view/pipelineNBDaftarWin/{id}', function ($id) {
        return view('report/pipelineNBDaftarWin');
    });
    Route::get('/view/pipelineNBDaftarLoss/{id}', function ($id) {
        return view('report/pipelineNBDaftarLoss');
    });
    Route::get('/view/pipelineNBDaftarAllPipeline/{id}', function ($id) {
        return view('report/pipelineNBDaftarAllPipeline');
    });
    Route::get('/view/pipelineNBDaftarPipelineQuotation/{id}', function ($id) {
        return view('report/pipelineNBDaftarPipelineQuotation');
    });
    Route::get('/view/pipelineNBDaftarPipelineKomitment/{id}', function ($id) {
        return view('report/pipelineNBDaftarPipelineKomitment');
    });
    Route::get('/view/pipelineNBRekapPerBulan/{id}', function ($id) {
        return view('report/pipelineNBRekapPerBulan');
    });
    Route::get('/view/pipelineNBRekapPerKanal/{id}', function ($id) {
        return view('report/pipelineNBRekapPerKanal');
    });
    Route::get('/view/pipelineNBRekapProgressAllPipeline/{id}', function ($id) {
        return view('report/pipelineNBRekapProgressAllPipeline');
    });
    Route::get('/view/pipelineNBRekapProgressPipelineKomitment/{id}', function ($id) {
        return view('report/pipelineNBRekapProgressPipelineKomitment');
    });
    Route::get('/view/pipelineNBRekapProgressPipelineQuotation/{id}', function ($id) {
        return view('report/pipelineNBRekapProgressPipelineQuotation');
    });
});

Route::group(['prefix' => 'isa/api'], function () {
    Route::post('insert-premi',  [IntegrationController::class, 'insertPremi']);
    Route::post('insert-premi-standard-indemnity', [IntegrationController::class, 'insertPremiStandard']);
    Route::post('insert-premi-keluarga-indemnity', [IntegrationController::class, 'insertPremiKeluarga']);
    Route::post('update-quotation',  [IntegrationController::class, 'updateQuotation']);
    Route::post('update-closing',  [IntegrationController::class, 'updateClosing']);
    Route::post('get-agent',  [IntegrationController::class, 'getAgent']);
    Route::post('get-coinsurance',  [IntegrationController::class, 'getCoInsurance']);
    Route::post('get-broker',  [IntegrationController::class, 'getBroker']);
});