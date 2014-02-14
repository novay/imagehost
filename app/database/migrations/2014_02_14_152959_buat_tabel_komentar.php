<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelKomentar extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('komentar', function($k) {
			$k->increments('id');
			$k->string('komentar');
			$k->unsignedInteger('id_member');
			$k->foreign('id_member')
				->references('id')->on('member')
				->onDelete('cascade');
			$k->unsignedInteger('id_gambar');
			$k->foreign('id_gambar')
				->references('id')->on('gambar')
				->onDelete('cascade');
			$k->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('komentar');
	}

}
