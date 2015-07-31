<?php


class Rak extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'rak';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	protected $fillable = array('rak','seksi_id');
	
	public function arsip()
    {
        return $this->hasMany('Arsip');
    }
	
	public function seksi()
    {
        return $this->belongsTo('Seksi');
    }
	
	public function box(){
		return $this->hasMany('Box');
	}

}