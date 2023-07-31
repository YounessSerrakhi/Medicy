<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//all api routes that need to be athentified
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [App\Http\Controllers\API\AuthApiController::class, 'logout']);
    Route::post('/medicines/demande', [App\Http\Controllers\API\MedicineApiController::class, 'handleDemande'])->name('clientDemande');
});



Route::get('/medicines', [App\Http\Controllers\API\MedicineApiController::class, 'index'])->name('medicines_view');

Route::post('/login',[App\Http\Controllers\API\AuthApiController::class, 'login']);
Route::post('/register',[App\Http\Controllers\API\AuthApiController::class, 'register']);
