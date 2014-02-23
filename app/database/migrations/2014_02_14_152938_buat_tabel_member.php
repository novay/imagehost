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
			$m->string('id', 7);
			$m->string('username', 20);
			$m->string('password', 50);
			$m->string('password_sementara', 50)->nullable();
			$m->string('nama_awal', 30);
			$m->string('nama_akhir', 30);
			$m->string('email', 50);
			$m->string('avatar')->default('avatar.jpg');
			$m->string('cover')->default('cover.jpg');
			$m->string('profesi', 50)->nullable();
			$m->text('bio')->nullable();
			$m->integer('akses');
			$m->integer('banned')->default(0);
			$m->string('konfirmasi', 50);
			$m->integer('aktif');
			$m->integer('poin');
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
