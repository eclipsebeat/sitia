<?php

class UtilityController extends \BaseController {

	use BackupManager\Manager;

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct(Manager $manager) 
	{
       	$this->manager = $manager;
	}

	public function index()
	{
		$title = 'Backup and Restore Data';
		$description = '--';
		return View::make('utility.index',compact('title','description'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$manager->makeBackup()->run('local', 'test/backup.sql');
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
		$manager->makeRestore()->run('local', 'storage_path('$id')');
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
