<?php

class MemberController extends BaseController {

	# Halaman Beranda @localhost:8000/member/dashboard
	public function getBeranda() {
		$gambar = Gambar::all();
		$member = Auth::user();
		return View::make('master.beranda', compact('gambar', 'member'));
	}

	# Halaman Member (GET)
	public function getMember($username) {
		# Asumsikan kita patok di field username
		$member = Member::where('username', '=', $username);
		# Jika member ada
		if($member->count()) {
			# Tampilkan halaman profil member
			$member = $member->first();
			return View::make('master.member', compact('member'));
		}
		return App::abort(404);
	}

	# Ganti Password Member (GET)
	public function getGantiSandi() {
		# Tampilkan halaman
		return View::make('master.password');
	}

	# Ganti Password Member (POST)
	public function postGantiSandi() {
		$validasi = Validator::make(Input::all(), array(
			'password_lama' 		=> 'required',
			'password'				=> 'required|min:6|different:password_lama',
			'konfirmasi_password'	=> 'required|same:password'
		));
		# Untuk validasi gagal
		if($validasi->fails()) {
			# Rujuk ke route dengan error validasi
			return Redirect::route('ganti-sandi')
				->withErrors($validasi);
		# Dan untuk validasi sukses
		} else {
			# Manipulasi isi database
			$user 			= Member::find(Auth::user()->id);
			# Ubah data
			$password_lama 	= Input::get('password_lama');
			$password 		= Input::get('password');
			# Bila password lama sesuai dengan sebelumnya
			if(Hash::check($password_lama, $user->getAuthPassword())) {
				# Manipulasi data password dengan data baru setelah di Hash
				$user->password = Hash::make($password);
				# Bila berhasil dimanipulasi
				if($user->save()) {
					# Rujuk ke beranda dengan pesan sukses
					return Redirect::route('beranda')
						->withPesan('Your Password has been changed successfully.');
				}
			# Sedangkan kalau password lama salah
			} else {
				return Redirect::route('ganti-sandi')
					->withPesan('Your old password is incorrect.');
			}
 		}
 		return Redirect::route('ganti-sandi')
				->withPesan('Your password could not be changed.');
	}
	
}