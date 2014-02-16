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
			$m->string('username', 20);
			$m->string('password', 50);
			$m->string('password_sementara', 50);
			$m->string('nama_depan', 30);
			$m->string('nama_belakang', 30);
			$m->string('email', 50);
			$m->string('avatar')->default('avatar.jpg');
			$m->string('cover')->default('cover.jpg');
			$m->string('profesi', 50);
			$m->text('bio');
			$m->integer('akses');
			$m->integer('banned');
			$m->string('konfirmasi', 50);
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
