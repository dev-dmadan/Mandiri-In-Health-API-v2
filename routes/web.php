<?php

use App\Models\Contact;
use App\Models\TreeTest;
use Carbon\Carbon;
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
    $contact = Contact::all()->first();
    echo Carbon::parse($contact->CreatedOn, 'UTC')
        ->setTimezone('Asia/Jakarta')
        ->format('d-m-Y');
});
