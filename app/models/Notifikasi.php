<?php

class Notifikasi extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'notifikasi';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	protected $fillable = array('gudang');
	
	public function arsip()
    {
        return $this->hasMany('Arsip');
    }
	
	public function seksi()
    {
        return $this->hasMany('Seksi');
    }

}