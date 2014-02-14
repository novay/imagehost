<?php

# Beranda, Login & Logout
Route::get('/', array('as' => 'beranda', 'uses' => 'AuthController@getIndex'));
Route::post('/', array('uses' => 'AuthController@postLogin'));
Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

# Daftar Member Baru
Route::post('daftar', array('as'=>'daftar', 'uses' => 'MemberController@postDaftar'));