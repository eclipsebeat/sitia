<?php

class HomeController extends \BaseController {

	public function index()
	{
		$arsips = Arsip::with('seksi', 'jenis_arsip')->orderBy('created_at', 'desc')->take(10)->get();
		$kantors = Kantor::with('Kanwil')->get();
		//var_dump($arsips->toArray());
		// Show the page
		$title = "Beranda";
		$description= "Beranda aplikasi";
		return View::make('index', compact('arsips', 'kantors','title','description'));
	}
}