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

}