@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="panel panel-default">
		  <!-- Default panel contents -->
		  	<div class="panel-heading">Daftar Arsip Terkini</div>
		  	<div class="panel-body">		  
	            <div class="col-md-4">
	            	<div class="col-md-12">
	            		<ul class="list-group">
						  <li class="list-group-item list-group-item-success">{{ $arsip->arsip }} <span class="badge">Nama Arsip</span></li>
						  <li class="list-group-item list-group-item-info">{{ $arsip->jenis_arsip->jenis }} <span class="badge">Jenis Arsip</span></li>
						  <li class="list-group-item list-group-item-warning">{{ $arsip->gudang->gudang }} <span class="badge">Gudang</span></li>
						  <li class="list-group-item list-group-item-danger">{{ $arsip->rak->rak }} <span class="badge">Nomor Rak</span></li>
						  <li class="list-group-item list-group-item-success">{{ $arsip->box->box }} <span class="badge">Nomor Box</span></li>
						  <li class="list-group-item list-group-item-info">{{ $arsip->user->nmdepan }} <span class="badge">User Rekam</span></li>
						  <li class="list-group-item list-group-item-warning">{{ $arsip->created_at }} <span class="badge">Tanggal Rekam</span></li>
						</ul>
						<div style="text-align: center;">
		                  	<span>
		                  	<a href="{{ $arsip->id }}/edit" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning">Ubah</a>
		                	</span>
		              </div>
	            	</div>
	            </div>
	            <div class="col-md-8">
	            	<div class="embed-responsive embed-responsive-16by9">
	            	<iframe src="doc/{{ $arsip->files }}" class="embed-responsive-item" type='application/pdf'></iframe>
	            	</div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@endsection