<?php

class PeminjamanController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = 'Peminjaman Arsip';
		$description = '--';
		$pinjams = Pinjam::all();
		$no = 1;
		
		
		return View::make('pinjam.index',compact('title','description','pinjams','no'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$title = 'Rekam Peminjaman Arsip';
		$description = '--';
		$arsips = Arsip::get();
		$no = 1;
		$users = User::get(['id','nmdepan','nmbelakang']);
		return View::make('pinjam.create', compact('arsips','no','title','description','users'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$pinjam = new Pinjam();
		$pinjam->arsip_id = Input::get('id');
		$pinjam->user_id = Input::get('peminjam');
		$pinjam->status = 2;
		$pinjam->time_pinjam = Carbon\Carbon::now();
		$pinjam->time_kembali = '0000-00-00 00:00:00';
		$pinjam->save();
		return Redirect::to('pinjam/create')->with('sukses','Rekam peminjaman berhasil!');
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
		$pinjam = Pinjam::find($id);
		$pinjam->status = 1;
		$pinjam->time_kembali = Carbon\Carbon::now();
		$pinjam->save();
		return Redirect::to('pinjam')->with('sukses','Rekam pengembalian pinjaman berhasil!');
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
