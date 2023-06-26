<?php

use App\Http\Controllers\AchievementAgentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClosingController;
use App\Http\Controllers\PipelineController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\SalesActivityController;
use Illuminate\Http\Request;
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
        });

        Route::group(['prefix' => 'quotation'], function () {
            Route::get('/', [QuotationController::class, 'index']);
            Route::get('/{id}', [QuotationController::class, 'show'])
                ->whereUuid('id');
        });

        Route::group(['prefix' => 'closing'], function () {
            Route::get('/', [ClosingController::class, 'index']);
            Route::get('/{id}', [ClosingController::class, 'show'])
                ->whereUuid('id');
        });
    });
});

use Illuminate\Support\Facades\Hash;
Route::get('/hashing-password', function(Request $request) {
    echo Hash::make($request->password);
});

use Illuminate\Support\Str;
Route::get('/get-uuid/{total?}', function ($total = 1) {
    for ($i=0; $i < $total; $i++) { 
        $id = (string) Str::orderedUuid();
        echo $id. '<br>';
    }
})
->whereNumber('total');


use App\Services\CreatioService;
Route::get('/test', function(Request $request) {
    // $creatio = new CreatioService("Supervisor", "Supervisor");

    // $id = 'b8f5cb73-0153-4123-b30d-03e3817f984f';
    // $response = $creatio->oData4('MdrPipeline')
    //     ->delete($id);

    // $response = $creatio->oData4('EmployeeJob')
    //     ->post([
    //         'Name' => 'Test Laravel 8'
    //     ]);

    // return response()->json($response);
    // return $response;

    $string = "CreatedById";
    // echo substr($string, 0, 3);
    echo substr($string, 0, -2);
});

use Illuminate\Support\Facades\Crypt;
Route::get('/test-password', function(Request $request) {
    echo Crypt::encryptString($request->password);
});