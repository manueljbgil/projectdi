<?php

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

/**
 * Unauthenticated Routes
 */
Route::get('/', 'MainController@index')->name('index');


/**
 *  Auth & Registration
 */
Auth::routes();

/**
 * Authenticated only Routes
 */
Route::resource('backyards', 'BackyardController');
Route::get('plantations/create/{backyard_id}', 'PlantationController@create');
Route::resource('plantations', 'PlantationController');
Route::resource('libraries', 'LibraryController');
Route::resource('images', 'ImageController');


/**
 * Backoffice Routes
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Backoffice', 'middleware' => ['auth', 'role:admin|manager']],
    function()
    {
        Route::get('/', 'DashboardController@index')->name('admin');

        Route::resource('user', 'UserController');
    }
);

