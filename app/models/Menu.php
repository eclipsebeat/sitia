<?php

class Menu {

	protected $menu = array();
	protected $url = 'mnarsip/';
	
	public function menuSurat(){
		$jns_arsips = Jenis_Arsip::all();
		if(count($jns_arsips)){
			foreach($jns_arsips as $jns_arsip){
				$this->menu[] = ['menu_name'=>$jns_arsip->jenis,'url'=>$this->url.$jns_arsip->alias];
			}
		}
		Session::put('menu',$this->menu);
	}
}