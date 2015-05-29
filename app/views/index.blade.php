@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-8 col-sm-12">
			<div class="jumbotron">
			  <h1>Aplikasi Arsip</h1>
			  @foreach ($kantors as $kantor)
			  <div class="col-md-4 col-lg-4 " align="left" > {{ HTML::image('arsip/img/logo.png', 'avatar', array('height' => '100')) }} </div>
			  <h2>{{ $kantor->kanwil->kanwil }}</h2>
			  <h3>{{ $kantor->kantor }}</h3>
			  <p>{{ $kantor->alamat }}</p>
			  <p>{{ $kantor->telpon, $kantor->fax, $kantor->email }}</p>
			  @endforeach
			</div>
		</div>
		<div class="col-md-4 col-sm-12">
			<div class="panel panel-default">
		  <!-- Default panel contents -->
		  	<div class="panel-heading">Daftar Arsip Terkini</div>
		  
	            <table class="table table-striped table-bordered table-hover">
	            <thead>
	            <tr>
	                <th>Arsip</th>
	                <th>Jenis Arsip</th>
	                <th>Seksi</th>
	            </tr>
	            </thead>
	            <tbody>
	            	@foreach ($arsips as $arsip)
	            <tr>
	                <td>{{ $arsip->arsip }}</td>
	                <td>{{ $arsip->jenis_arsip->jenis }}</td>
	                <td>{{ $arsip->seksi->seksi }}</td>
	            </tr>
	            @endforeach
	            </tbody>
	        </table>
	    </div>
	</div>
</div>
@endsection