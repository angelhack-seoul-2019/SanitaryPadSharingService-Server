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

Route::get('organization/list', 'OrganiController@getList');
Route::get('organization/around/{lat}/{lon}/{type}', 'OrganiController@getAround');
Route::get('organization/schedule/{organi_id}/{today}', 'OrganiController@getSchedule');
