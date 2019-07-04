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

Route::group(['prefix' => 'auth'], function(){
    Route::post('login', 'AuthController@login')->name('auth.login');
    Route::post('forgot', 'Auth\ForgotPasswordController@getResetToken');
    Route::post('forgot/reset', 'Auth\ResetPasswordController@reset');

    Route::group(['middleware' => 'auth:api'], function() {
        Route::post('logout', 'AuthController@logout')->name('auth.logout');
    });
});

Route::group(['middleware' => 'auth:api'], function(){
    Route::resource('user', 'UserApiController');
});