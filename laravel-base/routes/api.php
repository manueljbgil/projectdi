<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => 'auth:api'], function(){
    Route::apiResource('backyards',"API\BackyardAPIController");
    Route::apiResource('types',"API\TypeAPIController");
    Route::apiResource('plantations',"API\PlantationAPIController");
    Route::apiResource('libraries',"API\LibraryAPIController");
    
});

Route::apiResource('images',"API\ImageAPIController");

