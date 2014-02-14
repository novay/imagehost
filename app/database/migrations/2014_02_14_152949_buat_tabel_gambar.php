<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelGambar extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gambar', function($g) {
			$g->increments('id');
			$g->string('judul');
			$g->string('file');
			$g->string('label');
			$g->integer('suka');
			$g->integer('pribadi');
			$g->unsignedInteger('id_member');
			$g->foreign('id_member')
				->references('id')->on('member')
				->onDelete('cascade');
			$g->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gambar');
	}

}
