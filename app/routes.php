<?php

# Beranda, Login (GET)
Route::get('/', array(
	'as'	=> 'beranda', 
	'uses' 	=> 'AuthController@getIndex'
));

# Halaman Member (GET) @localhost:8000/novay
Route::get('{username}', array(
	'as' => 'profil-member',
	'uses' => 'MemberController@getMember'
));

# Grup Ter-Autentikasi
Route::group(array('before' => 'auth'), function() {

	# Halaman Beranda (GET) @localhost:8000/dashboard
	Route::get('member/dashboard', array(
		'as'	=> 'dashboard', 
		'uses' 	=> 'MemberController@getBeranda'
	));

	# Logout (GET)
	Route::get('member/logout', array(
		'as' => 'logout', 
		'uses' => 'AuthController@getKeluar'
	));

	# Ganti Password (GET)
	Route::get('member/change-password', array(
		'as' => 'ganti-sandi',
		'uses' => 'MemberController@getGantiSandi'
	));

	# Grup proteksi CSRF
	Route::group(array('before' => 'csrf'), function() {

		# Ganti Password (POST)
		Route::post('member/change-password', array(
			'as' => 'post-ganti-sandi',
			'uses' => 'MemberController@postGantiSandi'
		));

	});

});

# Grup yang belum ter-Autentikasi
Route::group(array('before' => 'guest'), function() {

	# Aktifkan Akun (GET)
	Route::get('member/activate/{konfirmasi}', array(
		'as' => 'beranda-aktif', 
		'uses' => 'AkunController@getAktif'
	));

	# Recover Password Baru (GET)
	Route::get('member/recovery/{konfirmasi}', array(
		'as' => 'beranda-recovery', 
		'uses' => 'AkunController@getRecovery'
	));

	# Grup proteksi CSRF
	Route::group(array('before' => 'csrf'), function() {
		
		# Beranda, Login (POST)
		Route::post('member/login', array(
			'as'	=> 'beranda-masuk',
			'uses' 	=> 'AuthController@postMasuk'
		));

		# Member baru (POST)
		Route::post('member/register', array(
			'as'	=> 'beranda-daftar',
			'uses'	=> 'AkunController@postDaftar'
		));

		# Request Password Baru (POST)
		Route::post('member/forgot', array(
			'as'	=> 'beranda-lupa-password',
			'uses'	=> 'AkunController@postLupaPassword'
		));

	});

});