<?php

class MemberController extends BaseController {

	# Pendaftaran Member Baru
	public function postDaftar() {
		# Validasi
		$validasi = Validator::make(Input::all(), array(
			'username'		=> 'required|min:3|max:20|unique:member',
			'email' 		=> 'required|email|max:50|unique:member',
			'password' 		=> 'required|min:6',
			'ulang_password'=> 'required|min:6|same:password'
		));
		# Bila tidak valid
		if($validasi->fails()) {
			# Alihkan ke halaman sebelumnya dengan inputan & error validasi
			return 	Redirect::back()->with_input()->with_errors($validasi);
		# Bila valid
		} else {
			# Acak id dengan angka sepanjang 10 digit
			$id 		= substr(number_format(time() * rand(), 0, '', ''), 0, 10);
			# Tarik inputan dari form
			$username 	= Str::title(Input::get('username'));
			$password 	= Hash::make(Input::get('password'));
			$email 	  	= Str::lower(Input::get('email'));			
			# Buat kata acak untuk konfirmasi pendaftaran
			$konfirmasi = Str::random(10);

			
		}
	}
	
}