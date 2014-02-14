<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

# Halaman Beranda
Route::get('/', array('as' => 'beranda', 'uses' => 'AuthController@getIndex'));
Route::post('/', array('uses' => 'AuthController@postLogin'));
Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));
