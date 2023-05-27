<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    if (Auth::check() && Auth::user()->is_admin) {
        return view('pages.welcome');
    }

    return redirect()->route('medicines_view');
});





Route::get('/admin', function () {
    return view('pages.welcome');
});


Route::get('/sale', function () {
    return view('pages.barcode.sale');
});
Route::get('/store', function () {
    return view('pages.barcode.store');
});




Route::get('/livrable' ,  [App\Http\Controllers\pagesController::class, 'index']);



//demand-admin
Route::get('/demande', [App\Http\Controllers\demandController::class, 'index']);
Route::get('/demand/index', [App\Http\Controllers\demandController::class, 'index'])->name('demand.index');
Route::get('/demand/show/{idDemand}', [App\Http\Controllers\demandController::class, 'show'])->name('demand.show');
Route::get('/demand/add/{idMedicine}/{quantity}/{idProvider}', [App\Http\Controllers\demandController::class, 'add'])->name('demand.add');
Route::get('/demand/create/{id}', [App\Http\Controllers\demandController::class, 'create'])->name('demand.create');
Route::get('/demand/edit/{idDemand}', [App\Http\Controllers\demandController::class, 'edit'])->name('demand.edit');
Route::get('/demand/save/{idDemand}', [App\Http\Controllers\demandController::class, 'save'])->name('demand.save');
Route::get('/demand/destroy/{idDemand}', [App\Http\Controllers\demandController::class, 'destroy'])->name('demand.destroy');
Route::POST('/demand/searchDemandeItems', [App\Http\Controllers\demandController::class, 'searchDemandeItems'])->name('inDemande.searchDemandeItems');


//demand-client
Route::get('/admin/clientDemande', [App\Http\Controllers\ClientDemandController::class, 'index'])->name('viewClientDemandes');
Route::delete('/admin/clientDemande/destroy/{id}', [App\Http\Controllers\ClientDemandController::class, 'destroy'])->name('destroyClientDemande');





//stocks
Route::get('/stock' ,  [App\Http\Controllers\stocksController::class, 'index'])->name('stock.index');
Route::get('/recentlyOut' ,  [App\Http\Controllers\stocksController::class, 'recentlyOut'])->name('stock.recentlyOut');
Route::get('/stock/addStock/{idDemand}', [App\Http\Controllers\stocksController::class, 'addStock'])->name('stock.addStock');
Route::get('/stock/createStock/{id}', [App\Http\Controllers\stocksController::class, 'createStock'])->name('stock.createStock');
Route::get('/stock/outStock/{id}', [App\Http\Controllers\stocksController::class, 'outStock'])->name('stock.outStock');
Route::POST('/stock/addItems', [App\Http\Controllers\stocksController::class, 'addItems'])->name('stock.addItems');
Route::POST('/stock/deleteItems', [App\Http\Controllers\stocksController::class, 'deleteItems'])->name('stock.deleteItems');
Route::POST('/stock/searchStocksItems', [App\Http\Controllers\stocksController::class, 'searchStocksItems'])->name('stock.searchStocksItems');





//provider
Route::get('/providers', [App\Http\Controllers\pagesController::class, 'provider'])->name('providers');



//medicine
Route::get('/medicine', [App\Http\Controllers\medicinesController::class,'index'])->name('medicines');
Route::get('/medicine/search', [App\Http\Controllers\medicinesController::class,'search'])->name('search');


//client_side
Route::get('/medicines_view', [App\Http\Controllers\clientController::class,'index'])->name('medicines_view');
Route::get('/medicines_view/demand', [App\Http\Controllers\clientController::class,'handleDemande'])->name('clientDemand');


Auth::routes();

