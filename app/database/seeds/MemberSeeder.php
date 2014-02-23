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
		$admin = array(
			'id' 		 			=> substr(str_shuffle(str_repeat('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', 5)), 0, 7), # substr(number_format(time() * rand(), 0, '', ''), 0, 7), 
			'username'	 			=> 'novay',
			'password'	 			=> Hash::make('admins'),
			'password_sementara'	=> '',
			'nama_awal' 			=> 'Noviyanto',
			'nama_akhir'			=> 'Rachmady',
			'email'					=> 'novay@otaku.si',
#			'avatar' 				=> 'avatar.jpg',
#			'cover'					=> 'cover.jpg',
			'profesi'				=> 'Mahasiswa',
			'bio'					=> 'Anak SMK biasa',
			'akses'					=> 1,
			'banned'				=> 0,
			'konfirmasi'			=> '', #Str::random(50),
			'aktif'					=> 1,
			'poin'					=> 0,
			'created_at'			=> new DateTime, 
			'updated_at'			=> new DateTime
		);
		$member = array(
			'id' 		 			=> substr(str_shuffle(str_repeat('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', 5)), 0, 7), # substr(number_format(time() * rand(), 0, '', ''), 0, 7), 
			'username'	 			=> 'member',
			'password'	 			=> Hash::make('admins'),
			'password_sementara'	=> '',
			'nama_awal' 			=> 'Member',
			'nama_akhir'			=> 'Aktif',
			'email'					=> 'member@novay.web.id',
#			'avatar' 				=> 'avatar.jpg',
#			'cover'					=> 'cover.jpg',
			'profesi'				=> '',
			'bio'					=> '',
			'akses'					=> 2,
			'banned'				=> 0,
			'konfirmasi'			=> '', #Str::random(50),
			'aktif'					=> 1,
			'poin'					=> 0,
			'created_at'			=> new DateTime, 
			'updated_at'			=> new DateTime
		);
		$aktif = array(
			'id' 		 			=> substr(str_shuffle(str_repeat('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', 5)), 0, 7), # substr(number_format(time() * rand(), 0, '', ''), 0, 7), 
			'username'	 			=> 'aktif',
			'password'	 			=> Hash::make('admins'),
			'password_sementara'	=> '',
			'nama_awal' 			=> 'Member',
			'nama_akhir'			=> 'Tidak Aktif',
			'email'					=> 'aktif@novay.web.id',
#			'avatar' 				=> 'avatar.jpg',
#			'cover'					=> 'cover.jpg',
			'profesi'				=> '',
			'bio'					=> '',
			'akses'					=> 2,
			'banned'				=> 0,
			'konfirmasi'			=> Str::random(50),
			'aktif'					=> 0,
			'poin'					=> 0,
			'created_at'			=> new DateTime, 
			'updated_at'			=> new DateTime
		);
		$banned = array(
			'id' 		 			=> substr(str_shuffle(str_repeat('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', 5)), 0, 7), # substr(number_format(time() * rand(), 0, '', ''), 0, 7), 
			'username'	 			=> 'banned',
			'password'	 			=> Hash::make('admins'),
			'password_sementara'	=> '',
			'nama_awal' 			=> 'Member',
			'nama_akhir'			=> 'Banned',
			'email'					=> 'banned@novay.web.id',
#			'avatar' 				=> 'avatar.jpg',
#			'cover'					=> 'cover.jpg',
			'profesi'				=> '',
			'bio'					=> '',
			'akses'					=> 2,
			'banned'				=> 1,
			'konfirmasi'			=> '', #Str::random(50),
			'aktif'					=> 1,
			'poin'					=> 0,
			'created_at'			=> new DateTime, 
			'updated_at'			=> new DateTime
		);


		# Inputkan nilai variabel kedalam tabel
		DB::table('member')->insert($admin);
		DB::table('member')->insert($member);
		DB::table('member')->insert($aktif);
		DB::table('member')->insert($banned);
	}
}