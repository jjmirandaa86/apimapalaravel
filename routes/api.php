<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CountryController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//RUTAS DE APLICACION

//Country
Route::get('/country/all', [CountryController::class, 'all']);
Route::get('/country/id/{idCountry}', [CountryController::class, 'getDataXIdCuntry']);
Route::get('/country/name/{name}', [CountryController::class, 'getDataXName']);
Route::get('/country/currency/{currency}', [CountryController::class, 'getDataXCurrency']);
Route::post('/country', [CountryController::class, 'create']);
Route::delete('/country/{idCountry}', [CountryController::class, 'destroyXIdCountry']);

Route::put('/country/edit/{id}', [CountryController::class, 'editXIdCountry']);

//Region
