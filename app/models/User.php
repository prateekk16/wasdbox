<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	//protected $hidden = array('password', 'remember_token');
	protected $fillable = array('email', 'password');

	public static $loginRules = [
		'email' => 'required|email',
		'password' => 'required|alpha_num|between:6,12'

	];



	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	public function personalInfo(){
		return $this->hasOne('UserPersonalInfo');
	}

	public function friendsInfo(){
		return $this->hasOne('FriendsInfo');
	}

}
