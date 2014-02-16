<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelMember extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member', function($m) {
			$m->integer('id');
			$m->string('username');
			$m->string('password');
			$m->string('password_sementara')
			$m->string('nama_depan');
			$m->string('nama_belakang');
			$m->string('email');
			$m->string('avatar');
			$m->string('cover');
			$m->string('profesi');
			$m->text('bio');
			$m->integer('akses');
			$m->integer('banned');
			$m->string('konfirmasi');
			$m->integer('aktif');
			$m->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member');
	}

}
