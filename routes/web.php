<?php

use App\Http\Controllers\BinarySearchController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/binary-search-test1', [BinarySearchController::class, 'testBinarySearchWithCollection']);
Route::get('/binary-search-test', [BinarySearchController::class, 'testBinarySearchWithNames']);


