<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelSitus extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('situs', function($s) {
			$s->increments('id');
			$s->string('nama', 20);
			$s->string('slogan', 100);
			$s->string('pemilik');
			$s->string('email');
			$s->string('facebook');
			$s->string('twitter');
			$s->string('github');
			$s->integer('perbaikan');
			$s->integer('aktif');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('situs');
	}

}
