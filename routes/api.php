<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CountryController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRouteController;
use App\Http\Controllers\VisitController;

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

//RUTAS PROTEGIDAS POR TOKEN
//===================================================================
Route::group(['middleware' => 'auth:api'], function () {

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

    //Route
    //=====================================
    Route::get('/route/all', [RouteController::class, 'all']);
    Route::get('/route/id/{idRoute}', [RouteController::class, 'getDataXIdRoute']);
    Route::get('/route/name/{name}', [RouteController::class, 'getDataXName']);
    Route::get('/route/office/{idOffice}', [RouteController::class, 'getDataXidOffice']);
    Route::post('/route', [RouteController::class, 'create']);
    Route::delete('/route/{idRoute}', [RouteController::class, 'destroyXIdRoute']);

    //User
    //=====================================
    Route::get('/user/all', [UserController::class, 'all']);
    Route::get('/user/id/{idUser}', [UserController::class, 'getDataXIdUser']);
    Route::get('/user/email/{email}', [UserController::class, 'getDataXEmail']);
    Route::delete('/user/{idUser}', [UserController::class, 'destroyXIdUser']);
    Route::delete('/user/{idUser}', [UserController::class, 'destroyXIdUser']);
    Route::post('/user/logout', [UserController::class, 'logout']);

    //User_Routes
    //=====================================
    Route::get('/userroute/all', [UserRouteController::class, 'all']);
    Route::get('/userroute/user/{idUser}', [UserRouteController::class, 'getUserRouteXidUser']);
    Route::get('/userroute/route/{idRoute}', [UserRouteController::class, 'getUserRouteXidRoute']);
    Route::post('/userroute', [UserRouteController::class, 'create']);

    //Visit
    //=====================================
    Route::post('/visit/dates', [VisitController::class, 'getXVisitaDate']);
    Route::post('/visit/route', [VisitController::class, 'getXIdRoute']);
    Route::post('/visit/routedate', [VisitController::class, 'getXVisitDateidRoute']);
    Route::post('/visit/routedatetype', [VisitController::class, 'getXVisitDateidRouteTypeVisit']);
});



//RUTAS DE APLICACION NO PROTEGIDAS PARA ACCESO A OPERAR
//===================================================================
Route::post('/user', [UserController::class, 'create']);
Route::post('/user/validate', [UserController::class, 'login']); //Validar la clave este correcta


//***************************************** */
//***************************************** */
// =====  SOLO PARA PRUEBAS, QUITAR EN PRD
//***************************************** */
//***************************************** */
Route::get('/user/token/{idUser}', [UserController::class, 'getApiToken']); //Devuelve el token SOLO DESARROLLO
