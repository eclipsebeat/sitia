<?php

class LokasiController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$gudang = Gudang::all();
		$seksi = Seksi::all();
		$rak = Rak::all();
		$box = Box::all();
		$lokasi = DB::table('gudang')
				->leftJoin('seksi','gudang.id','=','seksi.gudang_id')
				->leftJoin('rak','seksi.id','=','rak.seksi_id')
				->leftJoin('box','rak.id','=','box.rak_id')
				->select('gudang.gudang','seksi.seksi','rak.rak','box.box')
				->get();
		$title = 'pengaturan lokasi arsip';
		$description = 'pengaturan lokasi arsip';
		return View::make('lokasi.index',compact('gudang','seksi','rak','box','lokasi','title','description'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($target,$parentid=null)
	{	
		$parentid = $parentid==null?0:$parentid;
		$gudang = Gudang::all();
		$seksi = Seksi::all();
		$rak = Rak::all();
		$box = Box::all();
		$lokasi = DB::table('gudang')
				->leftJoin('seksi','gudang.id','=','seksi.gudang_id')
				->leftJoin('rak','seksi.id','=','rak.seksi_id')
				->leftJoin('box','rak.id','=','box.rak_id')
				->select('gudang.gudang','seksi.seksi','rak.rak','box.box')
				->get();
		$title = 'rekam ';
		$description = '';
		if($target=='gudang'){
			$parent = null;
			$target = 'gudang';
			$title .= 'gudang';
			$description .= 'rekam lokasi gudang';
		}elseif($target=='seksi'){
			$parent = Gudang::all();
			$target = 'seksi';
			$title .= 'seksi';
			$description .= 'rekam lokasi seksi';
		}elseif($target=='rak'){
			$parent = Seksi::with('gudang')->orderBy('gudang_id')->get();
			$target = 'rak';
			$title .= 'rak';
			$description .= 'rekam lokasi rak';
		}elseif($target=='box'){
			$parent = Rak::with('seksi')->orderBy('seksi_id')->get();
			$target = 'box';
			$title .= 'box';
			$description .= 'rekam lokasi box';
		}else{
			echo "Page not Found";
			return;
		}
		return View::make('lokasi.create',compact('parent','parentid','target','title','description','gudang','seksi','rak','box'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$target = Input::get('target');
		$parentid = Input::get('parentid');
		$title = 'rekam ';
		$description = '';
		$validator = null;
		$parent = null;
		$validator = Validator::make(Input::all(),
					array('lokasi'=> 'required'));
		if($target=='gudang'){
			$target = 'gudang';
			
			if($validator->passes()){
				$gudang = new Gudang();
				$gudang->gudang = Input::get('lokasi');
				$gudang->save();
				return Redirect::to('lokasi/create/gudang')
						->with('sukses','Gudang telah tersimpan!');
			}else{
				return Redirect::to('lokasi/create/gudang')
						->withErrors()
						->withInput();
			}
		}elseif($target=='seksi'){
			$parent = Gudang::all();
			$target = 'seksi';
			
			if($validator->passes()){
				$seksi = new Seksi();
				$seksi->seksi = Input::get('lokasi');
				$seksi->gudang_id = $parentid;
				$seksi->save();
				return Redirect::to('lokasi/create/seksi/'.$parentid)
						->with('sukses','Seksi telah tersimpan!');
			}else{
				return Redirect::to('lokasi/create/seksi/'.$parentid)
						->withErrors()
						->withInput();
			}
		}elseif($target=='rak'){
			$parent = Seksi::all();
			$target = 'rak';
			
			if($validator->passes()){
				$rak = new Rak();
				$rak->rak = Input::get('lokasi');
				$rak->seksi_id = $parentid;
				$rak->save();
				return Redirect::to('lokasi/create/rak/'.$parentid)
						->with('sukses','Rak telah tersimpan!');
			}else{
				return Redirect::to('lokasi/create/rak/'.$parentid)
						->withErrors()
						->withInput();
			}
		}elseif($target=='box'){
			$parent = Rak::all();
			$target = 'box';
			
			if($validator->passes()){
				$box = new Box();
				$box->box = Input::get('lokasi');
				$box->rak_id = $parentid;
				$box->save();
				return Redirect::to('lokasi/create/box/'.$parentid)
						->with('sukses','Box telah tersimpan!');
			}else{
				return Redirect::to('lokasi/create/box/'.$parentid)
						->withErrors()
						->withInput();
			}
		}else{
			echo "Page not Found";
			return;
		}
		return View::make('lokasi.create',compact('parent','title','description'));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($target,$id)
	{	
		
		$gudang = Gudang::all();
		$seksi = Seksi::all();
		$rak = Rak::all();
		$box = Box::all();
		$lokasi = DB::table('gudang')
				->leftJoin('seksi','gudang.id','=','seksi.gudang_id')
				->leftJoin('rak','seksi.id','=','rak.seksi_id')
				->leftJoin('box','rak.id','=','box.rak_id')
				->select('gudang.gudang','seksi.seksi','rak.rak','box.box')
				->get();
		$title = 'ubah ';
		$description = '';
		if($target=='gudang'){
			$title .= 'gudang';
			$gudang1 = Gudang::find($id);
			$lokasi = $gudang1->gudang;
		}elseif($target=='seksi'){
			$title .= 'seksi';
			$seksi1 = Seksi::find($id);
			$lokasi = $seksi1->seksi; 
		}elseif($target=='rak'){
			$title .= 'rak';
			$rak1 = Rak::find($id);
			$lokasi = $rak1->rak;
		}elseif($target=='box'){
			$title .= 'box';
			$box1 = Box::find($id);
			$lokasi = $box1->box;
		}else{
			echo "Page not found 404";
			return;
		}
		return View::make('lokasi.edit',compact('lokasi','id','target','title','description','gudang','seksi','rak','box'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{	
		$target = Input::get('target');
		$id = Input::get('id');
		$validator = Validator::make(Input::all(),array('lokasi'=>'required'));
		if($validator->passes()){
			if($target=='gudang'){
			
				$gudang = Gudang::find($id);
				$gudang->gudang = Input::get('lokasi');
				$gudang->save();
			}elseif($target=='seksi'){
				
				$seksi = Seksi::find($id);
				$seksi->seksi = Input::get('lokasi');
				$seksi->save();
			}elseif($target=='rak'){
				
				$rak = Rak::find($id);
				$rak->rak = Input::get('lokasi');
				$rak->save();
			}elseif($target=='box'){
				
				$box = Box::find($id);
				$box->box = Input::get('lokasi');
				$box->save();
			}
			return Redirect::to('lokasi/edit/'.$target.'/'.$id)
				->with('sukses','Ubah data '.$target.' berhasil!');
		}else{
			return Redirect::to('lokasi/edit/'.$target.'/'.$id)
				->withErrors()
				->withInput();
		}
		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($target,$id)
	{
		if($target=='gudang'){
			
			$gudang = Gudang::find($id);
			$gudang->delete();
		}elseif($target=='seksi'){
			
			$seksi = Seksi::find($id);
			$seksi->delete();
		}elseif($target=='rak'){
			
			$rak = Rak::find($id);
			$rak->delete();
		}elseif($target=='box'){
			
			$box = Box::find($id);
			$box->delete();
		}
		return Redirect::to('lokasi');
	}


}
