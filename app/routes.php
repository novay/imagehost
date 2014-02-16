<?php

# Beranda, Login
Route::get('/', array(
	'as'		=> 'beranda', 
	'uses' 	=> 'AuthController@getIndex'
));

# Logout
Route::get('logout', array(
	'as' => 'logout', 
	'uses' => 'AuthController@getLogout'
));

# Grup proteksi CSRF
Route::group(array('before' => 'csrf'), function() {
	
	# Beranda, Login (POST)
	Route::post('beranda', array(
		'as'		=> 'beranda-masuk',
		'uses' 	=> 'AuthController@postLogin'
	));

	# Member baru (POST)
	Route::post('daftar', array(
		'as'		=> 'beranda-daftar',
		'uses'	=> 'MemberController@postDaftar'
	));

});