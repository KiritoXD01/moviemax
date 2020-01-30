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

Route::post('user', 'UserApiController@store')->name('user.store');

Route::group(['middleware' => 'auth:api'], function() {
    Route::patch('user/{user}', 'UserApiController@update')->name('user.update');
    Route::post('movies', 'MovieApiController@search')->name('movie.search');
    Route::post('movies/addfavorite', 'MovieApiController@addFavoriteMovie')->name('movie.addFavorite');
    Route::post('movies/removefavorite', 'MovieApiController@removeFavoriteMovie')->name('movie.removeFavorite');
    Route::post('user/getFavorites/{user}', 'UserApiController@getfavoriteMovies')->name('user.getFavorites');
});