<?php


class Box extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'box';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	protected $fillable = array('box','rak_id');
	
	public function arsip()
    {
        return $this->hasMany('Arsip');
    }
	
	public function rak(){
		return $this->belongsTo('Rak');
	}

}