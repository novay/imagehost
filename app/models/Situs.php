<?php

class Situs extends Eloquent {

	# Target nama tabel
	protected $table = 'situs';

	# Set pengaturan situs
	public static function data() {
		# Target id pengaturan situs
		return Situs::find(1);
	}

}