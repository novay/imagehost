<?php

class MemberController extends BaseController {

	# Pendaftaran Member Baru
	public function postDaftar() {
		# Validasi
		$input = Input::all();
		$rules = array(
			'username'		=> 'required|max:20|unique:member,username',
			'email' 		=> 'required|email|max:50|unique:member,email',
			'password' 		=> 'required|min:6',
			'ulang_password'=> 'required|min:6|same:password_reg'
		);
		$validasi = Validator::make($input, $rules);
		# Bila tidak valid
		if($validasi->fails()) {
			# Alihkan ke halaman sebelumnya dengan inputan & error validasi
			return Redirect::back()->with_input()->with_errors($validasi);
		# Bila valid
		} else {
			# Acak id 10 sepanjang digit angka
			$id = substr(number_format(time() * rand(), 0, '', ''), 0, 9);
			# Tarik inputan dari form
			$username = Str::title(Input::get('username'));
			$password = Hash::make(Input::get('password'));
			$email 	  = Str::lower(Input::get('email'));			
			# Buat kata acak untuk konfirmasi pendaftaran
			$konfirmasi = Str::random(10);

			// cek id
			$cek = Member::cek($id);

			// looping sampai id belum terdaftar di database
			do
			{
				// panggil fungsi daftar() pada model User
				User::daftar($id, $nama, $email, $password, $konfirmasi);
			} while ($cek == 'ok');

			# Konfigurasi swift mailer
			// I'm creating an array with user's info but most likely you can use $user->email or pass $user object to closure later
			$user = array(
			    'email'=>'novay@otaku.si',
			    'name'=>'Noviyanto Rachmady'
			);
			IoC::register('mailer', function() {
    			$transport = Swift_SmtpTransport::newInstance('SMTP SERVER')
					->setUsername('EMAIL ANDA')
        			->setPassword('PASSWORD EMAIL ANDA');
				return Swift_Mailer::newInstance($transport);
			});
		
			// kirim email
			$isi = View::make('email.daftar', array('nama' => $nama, 'email' => $email, 'password' => $pass, 'konfirmasi' => $konfirmasi));
			$mailer = IoC::resolve('mailer');
			$pesan = Swift_Message::newInstance('Konfirmasi Pendaftaran Hosting Foto')
				->setFrom(array('EMAIL ANDA'  =>  'Admin Hosting Foto'))
				->setTo(array($email  =>  $nama))
				->setBody($isi,'text/html');
			$mailer->send($pesan);

			# Alihkan ke halaman sebelumnya dengan session sukses
			return Redirect::back()->with('sukses', 'Anda berhasil terdaftar, silahkan periksa email untuk dikonfirmasi.');

		}
	}
	
}