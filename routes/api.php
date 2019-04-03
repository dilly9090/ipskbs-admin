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

Route::get('update-token-firebase/{id?}','API\RestApiController@ShowTokenFireBase');
Route::post('update-token-firebase/{id?}','API\RestApiController@UpdateTokenFireBase');

Route::post('change-password','API\RestApiController@changepassword');
