<?php

class Seksi extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'seksi';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	protected $fillable = array('seksi','gudang_id');
	
	public function arsip()
    {
        return $this->hasMany('Arsip');
    }
	
	public function gudang()
    {
        return $this->belongsTo('Gudang');
    }
	
	public function rak()
    {
        return $this->hasMany('Arsip');
    }

}