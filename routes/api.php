<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CountryController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\OfficeController;

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
//=====================================
Route::get('/country/all', [CountryController::class, 'all']);
Route::get('/country/id/{idCountry}', [CountryController::class, 'getDataXIdCountry']);
Route::get('/country/name/{name}', [CountryController::class, 'getDataXName']);
Route::get('/country/currency/{currency}', [CountryController::class, 'getDataXCurrency']);
Route::post('/country', [CountryController::class, 'create']);
Route::delete('/country/{idCountry}', [CountryController::class, 'destroyXIdCountry']);
//Route::put('/country/edit/{id}', [CountryController::class, 'editXIdCountry']);

//Region
//=====================================
Route::get('/region/all', [RegionController::class, 'all']);
Route::get('/region/id/{idRegion}', [RegionController::class, 'getDataXIdRegion']);
Route::get('/region/name/{name}', [RegionController::class, 'getDataXName']);
Route::get('/region/country/{idCountry}', [RegionController::class, 'getDataXCountry']);
Route::post('/region', [RegionController::class, 'create']);
Route::delete('/region/{idRegion}', [RegionController::class, 'destroyXIdRegion']);

//Office
//=====================================
Route::get('/office/all', [OfficeController::class, 'all']);
Route::get('/office/id/{idOffice}', [OfficeController::class, 'getDataXIdOffice']);
Route::get('/office/name/{name}', [OfficeController::class, 'getDataXName']);
Route::get('/office/region/{idRegion}', [OfficeController::class, 'getDataXRegion']);
Route::post('/office', [OfficeController::class, 'create']);
Route::delete('/office/{idOffice}', [OfficeController::class, 'destroyXIdOffice']);
