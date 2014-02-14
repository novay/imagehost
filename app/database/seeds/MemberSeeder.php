<?php

class MemberSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		# Hapus bisa sebelumnya punya tabel
		DB::table('member')->delete();
		# Koleksi semua nilai dalam variabel member
		$member = array(
			'id' 		 	=> substr(number_format(time() * rand(), 0, '', ''), 0, 9),
			'username'	 	=> 'novay',
			'password'	 	=> Hash::make('admins'),
			'nama_depan' 	=> 'Noviyanto',
			'nama_belakang'	=> 'Rachmady',
			'email'			=> 'novay@otaku.si',
			'avatar' 		=> 'avatar.jpg',
			'cover'			=> 'cover.jpg',
			'profesi'		=> 'Mahasiswa',
			'bio'			=> 'Anak SMK biasa',
			'akses'			=> 1,
			'banned'		=> 0,
			'konfirmasi'	=> '', #Str::random(10),
			'created_at'	=> new DateTime, 
			'updated_at'	=> new DateTime
		);
		# Inputkan nilai variabel kedalam tabel
		DB::table('member')->insert($member);
	}
}