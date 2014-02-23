<?php

class AuthController extends BaseController {

	# Halaman Beranda @localhost:8000
	public function getIndex() {
		# Jika belum login
		if (Auth::guest())
			# Alihkan ke halaman login 
			return View::make('master.auth');
		# Untuk Akses Administrator
		if (Auth::user()->akses == '1') {
			$member 	= Auth::user();
			$situs 		= Situs::all();
			$gambar 	= Gambar::all();
			$komentar	= Komentar::all();
			$akun 		= Member::all();
			# Tampilkan view beranda pada folder master dengan varibel
			return View::make('master.admin', compact('member', 'situs', 'gambar', 'komentar', 'akun'));
		} 
		# Untuk akses member
		elseif (Auth::user()->akses == '2') {
			# Tampilkan view beranda pada folder master dengan varibel
			return View::make('master.member')->with('member', Auth::user());
		}
	}

	# Konfirmasi login member
	public function postMasuk() {
		# Validasi
		$validasi = Validator::make(Input::all(), array(
			'username'	=> 'required|min:3',
			'password'	=> 'required|min:5'
		));
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
			$ingat 	  = (Input::has('ingat')) ? true : false;
			# Gabung untuk proses pencocokan
			$userdata = compact('username', 'password');
			#### Syarat login member ####
			# 1. Pengguna harus terdaftar dengan logika ceklis remember me
			if (Auth::attempt($userdata, $ingat)) {
				# 2. Akun dalam keadaan aktif
				if (Auth::user()->aktif == 1) {
					# 3. Tidak sedang di banned
					if (Auth::user()->banned == 0) {
						# 4. Memiliki akses
						# 4.1 Untuk Administrator
						if (Auth::user()->akses == 1) {
							# Masuk ke halaman Administrator
							return Redirect::route('beranda');
						# 4.2 Untuk Member
						} elseif (Auth::user()->akses == 2) {
							# Lanjutkan ke halaman aplikasi
							return Redirect::route('beranda');
						# /4. Bila tidak memiliki akses member
						} else {
							# Hapus session & cookie
							Auth::logout();
							# Alihkan ke halaman sebelumnya dengan session error akses
							return Redirect::back()->withPesan("Your account doesn't have any access. Register for free.");
						}
					# /3. Bila akun anda di banned
					} else {
						# Hapus session & cookie
						Auth::logout();
						# Alihkan ke halaman sebelumnya dengan session error banned
						return Redirect::back()->withPesan('Your account has been banned, please contact Administrator.');
					}
				# /2. Bila akun Anda belum aktif
				} else {
					# Hapus session & cookie
					Auth::logout();
					# Alihkan ke halaman sebelumnya dengan session error konfirmasi
					return Redirect::back()->withPesan("Your account hasn't been confirmed, please check your email.");
				}
			# /1. Bila username tidak terdaftar
			} else {
				# Alihkan ke halaman sebelumnya dengan session error surel / sandi
				return Redirect::back()->withPesan("Username or password was incorrect, or account not activated.");
			}
		}
	}

	# Fungsi tombol Logout
	public function getKeluar() {
		# Hapus session & cookie member
		Auth::logout();
		# Alihkan ke beranda
		return Redirect::route('beranda');
	}
	
}