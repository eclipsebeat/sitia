<?php

use BackupManager\Manager;
use Symfony\Component\Process\Process;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class UtilityController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct(Manager $manager) {
	    $this->manager = $manager;
	}

	
	public function index()
	{
		$title = 'Backup and Restore Data';
		$utility = Utility::all();

		return View::make('utility.index',compact('title','description', 'utility'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		/*$filename = 'backup'.date('YmdHis').'.sql';


		$backup = $this->manager->makeBackup()->run('mysql', 'local', $filename, 'null');

		if($backup){			
			$utility = new Utility;
			$utility->backup = $filename;
			$utility->user_id = Auth::user()->id;
			$utility->save();

			Redirect::back()->with('message', 'Backup telah tersimpan');
		} else {
			Redirect::back()->with('message', 'Backup gagal');
		}*/

		$host = Config::get('database.connections.mysql.host');
        $database = Config::get('database.connections.mysql.database');
        $username = Config::get('database.connections.mysql.username');
        $password = Config::get('database.connections.mysql.password');
        $backupPath = app_path() . "\storage\backup\\";
        $backupFileName = $database . "-" . date("Y-m-d-H-i-s") . '.sql';		

        $path = "c:\\lamp\bin\mysql\mariadb-10.0.20\bin\mysqldump"; // dirubah sesuai file mysqldump dimana

        $command = $path . " -u " . $username . " -p " . $password . " " . $database . " > " . $backupPath . $backupFileName;
        if(system($command)){
        	$utility = new Utility;
			$utility->backup = $filename;
			$utility->user_id = Auth::user()->id;
			$utility->save();

			Redirect::back()->with('message', 'Backup telah tersimpan');
        } else {
			Redirect::back()->with('message', 'Backup gagal');
		}

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
		$manager = App::make(\BackupManager\Manager::class);
		$manager->makeRestore()->run('local', 'storage_path('.$id.')');
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
	
	public function menu(){
		$menu = Input::get('active');
		
		Session::put('menu',$menu);
	}

}
