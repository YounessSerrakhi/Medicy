<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.welcome');
});


Route::get('/sale', function () {
    return view('pages.barcode.sale');
});



Route::get('/livrable' ,  [App\Http\Controllers\pagesController::class, 'index']);



//demand
Route::get('/demande', [App\Http\Controllers\demandController::class, 'index']);
Route::get('/demand/index', [App\Http\Controllers\demandController::class, 'index'])->name('demand.index');
Route::get('/demand/show/{idDemand}', [App\Http\Controllers\demandController::class, 'show'])->name('demand.show');
Route::get('/demand/add/{idMedicine}/{quantity}/{idProvider}', [App\Http\Controllers\demandController::class, 'add'])->name('demand.add');
Route::get('/demand/create/{id}', [App\Http\Controllers\demandController::class, 'create'])->name('demand.create');
Route::get('/demand/edit/{idDemand}', [App\Http\Controllers\demandController::class, 'edit'])->name('demand.edit');
Route::get('/demand/save/{idDemand}', [App\Http\Controllers\demandController::class, 'save'])->name('demand.save');
Route::get('/demand/destroy/{idDemand}', [App\Http\Controllers\demandController::class, 'destroy'])->name('demand.destroy');


//stocks
Route::get('/stock' ,  [App\Http\Controllers\stocksController::class, 'index'])->name('stock.index');
Route::get('/stock/addStock/{idDemand}', [App\Http\Controllers\stocksController::class, 'addStock'])->name('stock.addStock');
Route::get('/stock/createStock/{id}', [App\Http\Controllers\stocksController::class, 'createStock'])->name('stock.createStock');
Route::get('/stock/outStock/{id}', [App\Http\Controllers\stocksController::class, 'outStock'])->name('stock.outStock');
Route::POST('/stock/searchItems', [App\Http\Controllers\stocksController::class, 'searchItems'])->name('stock.searchItems');


//Route::post('/search-items', 'stocksController@searchItems')->name('stock.searchItems');



//provider
Route::get('/providers', [App\Http\Controllers\pagesController::class, 'provider'])->name('providers');



//medicine
Route::get('/medicine', [App\Http\Controllers\medicinesController::class,'index']);
Route::get('/medicine/search', [App\Http\Controllers\medicinesController::class,'search'])->name('search');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
