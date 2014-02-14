<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Member extends Eloquent implements UserInterface, RemindableInterface {

	# Ambil tabel dari database
	protected $table = 'member';

	# Field yang boleh di input
	protected $fillable = [''];

	# Field yang jadi patokan
	protected $guarded = ['id'];

	# Rules validasi
	public static $rules = [
		'username' => 'required|min:5|max:20|exists:member,username', 
		'password' => 'required|min:5',
	];

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