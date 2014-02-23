<?php

class AkunController extends BaseController {

	# Pendaftaran Member Baru
	public function postDaftar() {
		# Validasi
		$validasi = Validator::make(Input::all(), array(
			'nama_awal'				=> 'required|min:3|max:30',
			'nama_akhir'			=> 'required|min:3|max:30',
			'd_email' 				=> 'required|email|max:50|unique:member,email',
			'd_username'			=> 'required|min:3|max:20|unique:member,username',
			'd_password' 			=> 'required|min:6|different:d_username',
			'konfirmasi_password'	=> 'required|min:6|same:d_password',
			'setuju'				=> 'required'
		));
		# Bila tidak valid
		if($validasi->fails()) {
			# Alihkan ke halaman sebelumnya dengan inputan & error validasi
			return 	Redirect::back()->withErrors($validasi)->withInput();
		# Bila valid
		} else {
			# Acak id dengan angka sepanjang 10 digit
			$id 		= substr(str_shuffle(str_repeat('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', 5)), 0, 7); #substr(number_format(time() * rand(), 0, '', ''), 0, 10);
			# Tarik inputan dari form
			$nama_awal	= Str::title(Input::get('nama_awal'));
			$nama_akhir	= Str::title(Input::get('nama_akhir'));
			$email 	  	= Str::lower(Input::get('d_email'));	
			$username 	= Input::get('d_username');
			$password 	= Hash::make(Input::get('d_password'));		
			# Buat kata acak untuk konfirmasi pendaftaran
			$konfirmasi = Str::random(50);
			# Manipulasi isi database
			$buat = Member::create(array(
				'id'			=> $id,
				'nama_awal'		=> $nama_awal,
				'nama_akhir'	=> $nama_akhir,
				'email' 		=> $email,
				'username'		=> $username,
				'password'		=> $password,
				'konfirmasi'	=> $konfirmasi,
				'akses'			=> '2',
				'aktif'			=> Situs::data()->aktif,
				'poin'			=> '10'
			));
			# Bila selesai dimanipulasi
			if($buat) {
				# Kirim pesan kode konfirmasi
				Mail::send('emails.auth.activate', 
					array(
						'konfirmasi'=> URL::route('beranda-aktif', $konfirmasi), 
						'nama_awal'	=> $nama_awal,
						'nama_akhir'=> $nama_akhir,
					), function($pesan) use ($buat) {
						$pesan->to($buat->email, $buat->username)->subject('Hurry up! Activate your account now.');
					}
				);
				# Rujuk ke beranda dengan pesan sukses
				return Redirect::route('beranda')
					->withPesan('Your account has been created! Please open your email to activate it.');
			}
		}
	}

	# Aktifasi member baru
	public function getAktif($konfirmasi) {
		# Pencocokan konfirmasi yg diterima dan member yg tidak aktif
		$member = Member::where('konfirmasi', '=', $konfirmasi)->where('aktif', '=', 0);
		# Bila member yang dimaksud ada
		if($member->count()) {
			$member = $member->first();
			# Aktifkan member, hapus kode kofirmasi
			$member->aktif			= 1;
			$member->konfirmasi 	= '';
			# Bila database berhasil dimanipulasi
			if($member->save()) {
				# Rujuk ke beranda dengan pesan sukses
				return Redirect::route('beranda')
					->withPesan('Congratulation! Your account has been activated. Login Now!');
			}
		}
		# Bila member tidak ada, rujuk ke beranda dengan pesan error
		return Redirect::route('beranda')
			->withPesan('We could not activate your account. Please, try again later.');
	}

	# Minta Password Baru
	public function postLupaPassword() {
		# Validasi
		$validasi = Validator::make(Input::all(), array(
			'i_email' => 'required|email'
		));
		# Bila validasi gagal
		if($validasi->fails()) {
			# Rujuk ke route
			return Redirect::route('beranda')
				->withErrors($validasi)
				->withInput();
		# Untuk validasi sukses
		} else {
			# 
			$user = Member::where('email', '=', Input::get('i_email'));

			if($user->count()) {
				$user 						= $user->first();

				$konfirmasi 				= Str::random(50);
				$password 					= Str::random(10);

				$user->konfirmasi 			= $konfirmasi;
				$user->password_sementara	= Hash::make($password);

				if($user->save()) {
					
					Mail::send('emails.auth.recovery', 
						array(
							'konfirmasi'	=> URL::route('beranda-recovery', $konfirmasi), 
							'username' 		=> $user->username, 
							'password' 		=> $password
						),
						function($pesan) use ($user) {
							$pesan->to($user->email, $user->username)->subject('Hi there! Here your new password');
						}
					);

					return Redirect::route('beranda')
						->withPesan('We have sent you a new password by email.');
				}
			}
		}
		# 
		return Redirect::route('beranda')
			->withPesan('Could not request new password.');
	}

	public function getRecovery($konfirmasi) {
		$member = Member::where('konfirmasi', '=', $konfirmasi)->where('password_sementara', '!=', '');

		if($member->count()) {
			$member = $member->first();

			$member->password 			= $member->password_sementara;
			$member->password_sementara = '';
			$member->konfirmasi 		= '';

			if($member->save()) {
				return Redirect::route('beranda')->withPesan('Your acount has been recovered and you can sign in with your new password.');
			}
		}

		return Redirect::route('beranda')->withPesan('We could not recovery your account.');
	}
	
}