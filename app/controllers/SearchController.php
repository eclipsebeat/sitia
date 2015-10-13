<?php

class SearchController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		return View::make('cari.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function custom()
	{
		return View::make('cari.custom');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(),array('search'=>'required'));
		if($validator->passes()){
			$results = Arsip::where('arsip','like','%'.Input::get('search').'%')
						->with('jenis_arsip','gudang','seksi','rak','box','pinjam')
						->get();
			$no = 1;
			return View::make('cari.result',compact('results','no'));
		}else{
			return Redirect::to('search')
				->withErrors();
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$validator = Validator::make(Input::all(),array('search'=>'required'));
		if($validator->passes()){
			$rule = Input::get('select');

			switch ($rule) {
			   case 1:
			         $results = Arsip::where('arsip','like','%'.Input::get('search').'%')
								->with('jenis_arsip','gudang','seksi','rak','box','pinjam')
								->get();
					 $no = 1;
					 return View::make('cari.custom',compact('results','no'));
			         break;
			   case 2:
			        $results = Arsip::where('files','like','%'.Input::get('search').'%')
								->with('jenis_arsip','gudang','seksi','rak','box','pinjam')
								->get();
					$no = 1;
					return View::make('cari.custom',compact('results','no'));
			         break;
			   case 3:
			         $search = Jenis_Arsip::where('jenis', 'like','%'.Input::get('search').'%')
			         			->orWhere('alias', 'like','%'.Input::get('search').'%')->get();
			         $id = array_unique( $search->lists('id') );
			         $results = Arsip::whereIn('jenis_arsip_id', $id)
								->with('jenis_arsip','gudang','seksi','rak','box','pinjam')
								->get();
					  $no = 1;
					  return View::make('cari.custom',compact('results','no'));
			         break;
			    case 4:
			         $search = Gudang::where('gudang', 'like','%'.Input::get('search').'%')->get();
			         $id = array_unique( $search->lists('id') );
			         $results = Arsip::whereIn('gudang_id', $id)
								->with('jenis_arsip','gudang','seksi','rak','box','pinjam')
								->get();
					  $no = 1;
					  return View::make('cari.custom',compact('results','no'));
			         break;
			    case 5:
			         $results = Arsip::where('rak_id', '=', Input::get('search'))
								->with('jenis_arsip','gudang','seksi','rak','box','pinjam')
								->get();
					  $no = 1;
					  return View::make('cari.custom',compact('results','no'));
			         break;
			    case 6:
			         $results = Arsip::where('box_id', '=', Input::get('search'))
								->with('jenis_arsip','gudang','seksi','rak','box','pinjam')
								->get();
					  $no = 1;
					  return View::make('cari.custom',compact('results','no'));
			         break;
			    case 7:
			         $search = Seksi::where('seksi', 'like','%'.Input::get('search').'%')->get();
			         $id = array_unique( $search->lists('id') );
			         $results = Arsip::whereIn('seksi_id', $id)
								->with('jenis_arsip','gudang','seksi','rak','box','pinjam')
								->get();
					  $no = 1;
					  return View::make('cari.custom',compact('results','no'));
			         break;
			    case 8:
			         $search = User::where('username', 'like','%'.Input::get('search').'%')->get();
			         $id = array_unique( $search->lists('id') );
			         $results = Arsip::whereIn('user_id', $id)
								->with('jenis_arsip','gudang','seksi','rak','box','pinjam')
								->get();
			         
					 $no = 1;
					 return View::make('cari.custom',compact('results','no'));
			        break;
			}
		}else{
			return Redirect::to('custom')
				->with('message', 'Pencarian tidak ditemukan di Database');
		}
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
