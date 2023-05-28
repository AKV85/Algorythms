<?php

use App\Http\Controllers\BinarySearchController;
use App\Http\Controllers\BubbleSortController;
use App\Http\Controllers\LinearSearchController;
use App\Http\Controllers\SelectionSortController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;


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

Route::get('/your-route', function () {
    $testController = new TestController();
    $testController->testBubbleSort();
//    var_dump($testController);
});

Route::post('/linear-search', [LinearSearchController::class, 'performLinearSearch']);

Route::get('/binary-search-test1', [BinarySearchController::class, 'testBinarySearchWithCollection']);
Route::get('/binary-search-test', [BinarySearchController::class, 'testBinarySearchWithNames']);

Route::get('/selection-sort', [SelectionSortController::class, 'testSelectionSort']);

Route::get('/bubble-sort', [BubbleSortController::class, 'testBubbleSort']);


