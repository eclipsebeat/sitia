<?php


class Pinjam extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pinjam';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	protected $fillable = array('arsip_id', 'user_id', 'status', 'time_pinjam', 'time_kembali');
	
	public function arsip()
    {
        return $this->belongsTo('Arsip');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
	
	public static function isPinjam($id_arsip){ //return boolean
		$pinjam = self::where('arsip_id','=',$id_arsip)
					->select(DB::raw('MAX(id)'),'status')
					->get();
		if($pinjam[0]->status==2){
			return true;
		}
		return false;
	}

}