<?php

use App\Http\Controllers\AchievementAgentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClosingController;
use App\Http\Controllers\LookupController;
use App\Http\Controllers\PipelineController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\SalesActivityController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('secret_key_is_valid')->group( function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/validate', [AuthController::class, 'validateToken']);

    Route::middleware('auth:sanctum')->group( function () {
        Route::get('/logout', [AuthController::class, 'logout']);

        Route::group(['prefix' => 'achievement-agent'], function () {
            Route::get('/', [AchievementAgentController::class, 'index']);
        });

        Route::group(['prefix' => 'pipeline'], function () {
            Route::get('/', [PipelineController::class, 'index']);
            Route::get('/{id}', [PipelineController::class, 'show'])
                ->whereUuid('id');
            Route::post('/', [PipelineController::class, 'store']);
            Route::put('/{id}', [PipelineController::class, 'update'])
                ->whereUuid('id');
            Route::delete('/{id}', [PipelineController::class, 'destroy'])
                ->whereUuid('id');
        });

        Route::group(['prefix' => 'sales-activity'], function () {
            Route::get('/', [SalesActivityController::class, 'index']);
            Route::get('/{id}', [SalesActivityController::class, 'show'])
                ->whereUuid('id');
            // Route::post('/', [SalesActivityController::class, 'store']);
            Route::put('/{id}', [SalesActivityController::class, 'update'])
                ->whereUuid('id');
            Route::delete('/{id}', [SalesActivityController::class, 'destroy'])
                ->whereUuid('id');
        });

        Route::group(['prefix' => 'quotation'], function () {
            Route::get('/', [QuotationController::class, 'index']);
            Route::get('/{id}', [QuotationController::class, 'show'])
                ->whereUuid('id');
            // Route::post('/', [QuotationController::class, 'store']);
            Route::put('/{id}', [QuotationController::class, 'update'])
                ->whereUuid('id');
            Route::delete('/{id}', [QuotationController::class, 'destroy'])
                ->whereUuid('id');
        });

        Route::group(['prefix' => 'closing'], function () {
            Route::get('/', [ClosingController::class, 'index']);
            Route::get('/{id}', [ClosingController::class, 'show'])
                ->whereUuid('id');
            // Route::post('/', [ClosingController::class, 'store']);
            Route::put('/{id}', [ClosingController::class, 'update'])
                ->whereUuid('id');
            Route::delete('/{id}', [ClosingController::class, 'destroy'])
                ->whereUuid('id');
        });

        Route::get('/lookup/{lookup}', [LookupController::class, 'index'])
            ->where('lookup', '[A-Za-z-]+');
    });
});