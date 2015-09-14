<?php

class JenisArsipController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = 'Daftar Jenis Arsip';
		$description = '--';
		$jenisarsips = Jenis_Arsip::get();
		$no = 1;
		return View::make('jenis_arsip.index',compact('title','description','jenisarsips','no'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$title = 'Rekam Jenis Arsip';
		$description = '--';
		$jenisarsips = Jenis_Arsip::get();
		$no = 1;
		return View::make('jenis_arsip.create',compact('title','description','jenisarsips','no'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array('jenis'=>'required','retensi'=>'required|numeric');
		
		$validator = Validator::make(Input::all(),$rules);
		
		if($validator->passes()){
			$jenisarsip = new Jenis_Arsip();
			$jenisarsip->jenis = Input::get('jenis');
			$jenisarsip->retensi = Input::get('retensi');
			$jenisarsip->save();
			return Redirect::to('jenisarsip/create')
				->with('sukses','Rekam jenis arsip berhasil!');
		}else{
			return Redirect::to('jenisarsip/create')
				->withErrors()
				->withInput();
		}
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
	public function edit($id)
	{	
		$jenisarsips = Jenis_Arsip::get();
		$no = 1;
		$jenisarsip = Jenis_Arsip::find($id);
		$title = 'Ubah Jenis Arsip';
		$description = '--';
		return View::make('jenis_arsip.edit',compact('jenisarsip','title','description','jenisarsips','no'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$id = Input::get('id'); 
		$jenisarsip = Jenis_Arsip::find($id);
		$rules = array('jenis'=>'required','retensi'=>'required|numeric');
		$validator = Validator::make(Input::all(),$rules);
		if($validator->passes()){
			$jenisarsip->jenis = Input::get('jenis');
			$jenisarsip->retensi = Input::get('retensi');
			$jenisarsip->save();
			return Redirect::to('jenisarsip/'.$id)
				->with('sukses','Ubah data jenis arsip berhasil!');
		}else{
			return Redirect::to('jenisarsip/'.$id)
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
	public function destroy($id)
	{
		$jenisarsip = Jenis_Arsip::find($id);
		$jenisarsip->save();
		return Redirect::to('jenisarsip');
	}


}
