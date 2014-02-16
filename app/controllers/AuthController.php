<?php

class AuthController extends BaseController {

	# Halaman Beranda @localhost:8000
	public function getIndex() {
		# Jika belum login
		if (Auth::guest())
			# Alihkan ke halaman login 
			return View::make('master.login');
		# Sebaliknya, tampilkan view index pada folder master
		return View::make('master.index');
	}

	# Konfirmasi login member
	public function postLogin() {
		# Validasi
		$validasi = Validator::make(Input::all(), Member::$rules);
		# Tidak valid
		if($validasi->fails()) {
			# alihkan ke halaman sebelumnya dengan validasi error
			return 	Redirect::back()
					->withInput()
					->withErrors($validasi);
		# Bila valid
		} else {
			# Koleksi inputan dari form
			$username = Input::get('username');
			$password = Input::get('password');
			$ingat 	  = Input::get('ingat');
			# Gabung untuk proses pencocokan
			$userdata = compact('username', 'password');
			#### Syarat login member ####
			# 1. Pengguna harus terdaftar dengan logika ceklis remember me
			if (Auth::attempt($userdata, $ingat)) {
				# 2. Akun dalam keadaan aktif
				if (Auth::user()->aktif == 1) {
					# 3. Tidak sedang di banned
					if (Auth::user()->banned == 0) {
						# 4. Memiliki akses member
						if (Auth::user()->akses == 1) {
							# Lanjutkan ke halaman aplikasi
							return Redirect::route('beranda');
						# /4. Bila tidak memiliki akses member
						} else {
							# Hapus session & cookie
							Auth::logout();
							# Alihkan ke halaman sebelumnya dengan session error akses
							return Redirect::back()->with('error', 'Akun Anda tidak memiliki akses member.');
						}
					# /3. Bila akun anda di banned
					} else {
						# Hapus session & cookie
						Auth::logout();
						# Alihkan ke halaman sebelumnya dengan session error banned
						return Redirect::back()->with('error', 'Akun Anda di banned sementara. Harap hubungi Admin website.');
					}
				# /2. Bila akun Anda belum aktif
				} else {
					# Hapus session & cookie
					Auth::logout();
					# Alihkan ke halaman sebelumnya dengan session error konfirmasi
					return Redirect::back()->with('error', 'Akun Anda belum dikonfirmasi, silahkan periksa ulang email Anda.');
				}
			# /1. Bila username dan password tidak terdaftar
			} else {
				# Alihkan ke halaman sebelumnya dengan session error surel / sandi
				return Redirect::back()->with('error', 'Username atau password yang dimasukkan ngawur.');
			}
		}
	}

	# Fungsi tombol Logout
	public function getLogout() {
		# Hapus session & cookie member
		Auth::logout();
		# Alihkan ke beranda
		return Redirect::route('beranda');
	}
	
}