<?php

class SitusSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		# Hapus bisa sebelumnya punya tabel
		DB::table('situs')->delete();
		# Koleksi semua nilai dalam variabel situs
		$situs = array(
			'id'		=> '1',
			'nama'		=> 'ImaGhost',
			'slogan'	=> 'Spread your image to the entire world.',
			'pemilik'	=> 'Noviyanto Rachmady',
			'email'		=> 'noviyantorachmady@gmail.com',
			'facebook'	=> 'novaymawbowo',
			'twitter'	=> 'novaymawbowo',
			'github'	=> 'novay',
			'perbaikan'	=> '0',
			'aktif'		=> '0'
		);
		# Inputkan nilai variabel kedalam tabel
		DB::table('situs')->insert($situs);
	}

}