<?php

class ArsipController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$arsips = Arsip::with('seksi', 'gudang', 'rak', 'jenis_arsip', 'user', 'box')->get();
		//var_dump($arsips->toArray());
		// Show the page
		return View::make('arsip.arsip', compact('arsips'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$jenisArsip = DB::table('jenis_arsip')->orderBy('id', 'asc')->lists('jenis','id');
		$gudang = DB::table('gudang')->orderBy('id', 'asc')->lists('gudang','id');
		$rak = DB::table('rak')->orderBy('id', 'asc')->lists('rak','id');
		$box = DB::table('box')->orderBy('id', 'asc')->lists('box','id');
		$seksi = DB::table('seksi')->orderBy('id', 'asc')->lists('seksi','id');

		return View::make('arsip.rekam', compact('jenisArsip', 'seksi', 'gudang', 'rak', 'box'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'arsip' => 'required',
			'jenis_arsip_id' => 'required',
			'gudang_id' => 'required',
			'rak_id' => 'required',
			'box_id' => 'required',
			'seksi_id' => 'required',
			'files' => 'mimes:doc,docx,pdf,txt|max:9000'
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
        return Redirect::to('forms/create')->withErrors($validator);
    	} else {
    		//var_dump(Input::all());
    		$arsip = new Arsip;

    		if (Input::hasFile('files')){
    			$doc = Input::file('files');

    			 $filename = $doc->getClientOriginalName();
    			 $destinationPath = public_path('arsip/doc/');
    			 $uploadSuccess = Input::file('files')->move($destinationPath, $filename);
    			
    		}

    		$arsip->arsip = Input::get('arsip');
    		$arsip->files = $filename;
    		$arsip->jenis_arsip_id = Input::get('jenis_arsip_id');
    		$arsip->gudang_id = Input::get('gudang_id');
    		$arsip->rak_id = Input::get('rak_id');
    		$arsip->box_id = Input::get('box_id');
    		$arsip->seksi_id = Input::get('seksi_id');
    		$arsip->user_id = Input::get('user_id');
    		$arsip->save();

    		return Redirect::to('/arsip');
        	Session::flash('message', 'Arsip telah tersimpan');
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

		$arsips = Arsip::with('seksi', 'gudang', 'rak', 'jenis_arsip', 'user', 'box')->whereId($id)->first();
		var_dump($arsips->toArray());
		// Show the page
		//return View::make('arsip.arsip', compact('arsips'));	
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
