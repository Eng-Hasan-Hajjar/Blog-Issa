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

/*

Route::post('/auth/token', 'Api\AuthController@getAccessToken');
Route::post('/auth/reset-password', 'Api\AuthController@passwordResetRequest');
Route::post('/auth/change-password', 'Api\AuthController@changePassword');

Route::group(['middleware' => 'auth:api', 'namespace' => 'Api'], function() {
    Route::get('/tags', 'ListingController@tags');
    Route::get('/categories', 'ListingController@categories');
    Route::get('/users', 'ListingController@users')->middleware('admin');

    Route::resource('/posts', 'PostController', ['only' => ['index', 'show']]);
});

*/
