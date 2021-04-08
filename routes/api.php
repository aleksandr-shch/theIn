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

Route::post('login', 'AuthController@authenticate');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::resource('organization', 'OrganisationController')
//    ->only(['index', 'create']);

Route::prefix('organisation')->group(function () {
    Route::get('', 'OrganisationController@index');
    Route::post('', 'OrganisationController@store')->middleware('auth:api');
});