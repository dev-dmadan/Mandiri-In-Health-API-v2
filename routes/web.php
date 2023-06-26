<?php

use App\Models\Contact;
use App\Models\TreeTest;
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

Route::get('/', function() {

    function buildTree($data, $parentId = null)
    {
        $result = [];

        foreach ($data as $row) {
            if ($row['ParentId'] === $parentId) {
                $children = buildTree($data, $row['Id']);

                if (!empty($children)) {
                    $row['children'] = $children;
                }

                $result[] = $row;
            }
        }

        return $result;
    }

    $data = TreeTest::with('descendants')->get()
        // ->map(function($item) {
        //     unset($item->descendants);
        //     return $item;
        // })
        ->toArray();
        return response()->json($data);

    $result = buildTree($data);
    return response()->json($result);
});
