<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Member extends Eloquent implements UserInterface, RemindableInterface {

	# Ambil tabel dari database
	protected $table = 'member';

	# Field yang boleh di input
	protected $fillable = array('id', 'nama_awal', 'nama_akhir', 
		'email', 'username', 'password', 'password_sementara', 
		'avatar', 'cover', 'profesi', 'bio', 'akses', 'banned', 
		'konfirmasi', 'aktif', 'poin'
	);

	# Field yang jadi patokan
	protected $guarded = array('id');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}