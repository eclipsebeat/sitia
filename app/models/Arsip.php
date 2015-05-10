<?php


class Arsip extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'arsip';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	protected $fillable = array('arsip', 'jenis_arsip_id', 'gudang_id', 'user_id', 'rak_id', 'seksi_id');
	
	public function jenisarsip()
    {
        return $this->belongsTo('JenisArsip');
    }

    public function gudang()
    {
        return $this->belongsTo('Gudang');
    }

    public function rak()
    {
        return $this->belongsTo('Gudang');
    }

    public function box()
    {
        return $this->belongsTo('Box');
    }

    public function seksi()
    {
        return $this->belongsTo('Seksi');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

}