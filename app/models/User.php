<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	use HasRole; 

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';



	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	public function arsip()
    {
        return $this->hasMany('Arsip');
    }
	
	public function pinjam()
	{
		return $this->hasMany('Pinjam');
	}

    public function getId()
	{
	  return $this->id;
	}
}
