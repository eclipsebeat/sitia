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
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
