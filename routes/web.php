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

Auth::routes([
    'register' => false
]);

Route::get('/changelanguage/{language}', 'HomeController@changeLanguage')->name('changeLanguage');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');
Route::resource('users', 'UserController');
Route::patch('/users/{user}/updatepassword', 'UserController@updatePassword')->name('users.updatePassword');
Route::resource('movies', 'MovieController');
