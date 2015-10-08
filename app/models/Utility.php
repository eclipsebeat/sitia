<?php


class Utility extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'utility';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	protected $fillable = array('backup', 'user_id');
	

    public function user()
    {
        return $this->belongsTo('User');
    }
	

}