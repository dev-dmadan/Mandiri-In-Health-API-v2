<?php

use App\Http\Controllers\DashboardController;
use App\Models\Contact;
use App\Models\TreeTest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::middleware('secret_key_is_valid')->group( function () {

    Route::group(['prefix' => 'dashboard'], function () {
        // performanceNasional
        Route::get('/performance-nasional', [DashboardController::class, 'performanceNasional']);
        Route::get('/performance-nasional/{id}', [DashboardController::class, 'performanceNasional'])
            ->whereUuid('id');
        
        // quotationDashboard
        Route::get('/quotation-dashboard', [DashboardController::class, 'quotationDashboard']); 
        
        // pipelineNewBusinessDashboard
        Route::get('/pipeline-new-business-dashboard', [DashboardController::class, 'pipelineNewBusinessDashboard']); 
        
        // pipelineRenewalDashboard
        Route::get('/pipeline-renewal-dashboard', [DashboardController::class, 'pipelineRenewalDashboard']); 
        
        // pipelineNewBusinessDashboardKanal
        Route::get('/pipeline-new-business-dashboard-kanal/{kanalDistribusiId}', [DashboardController::class, 'pipelineNewBusinessDashboardKanal'])
            ->whereUuid('kanalDistribusiId');
            
        // pipelineNewBusinessDashboardKanal
        Route::get('/pipeline-renewal-dashboard-kanal/{kanalDistribusiId}', [DashboardController::class, 'pipelineRenewalDashboardKanal'])
            ->whereUuid('kanalDistribusiId');
    });

    Route::group(['prefix' => 'report'], function () {
        
    });

});