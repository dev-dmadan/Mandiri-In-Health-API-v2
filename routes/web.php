<?php

use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

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

Route::get('/', function () {
    $columns = [];
    foreach (Schema::getColumnListing('MdrQuotation') as $column) {
        $columns[] = [
            'name' => $column,
            'type' => Schema::getColumnType('MdrQuotation', $column)
        ];
    }

    dd($columns);
});
