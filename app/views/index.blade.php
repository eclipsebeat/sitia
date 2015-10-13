@extends('layouts.master')

@section('content')
	<div id="legend" style="margin-top:3em;margin-bottom:-20px">
	  {{--<legend class="">Daftar Arsip</legend>--}}
	  <a href="{{URL::to('arsip/create')}}"><button class="btn-info btn">rekam</button></a>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="panel panel-default">
		  <!-- Default panel contents -->
		  	<div class="panel-heading">Daftar Arsip Terkini</div>
		  
	            <table class="table table-striped table-bordered table-hover">
	            <thead>
	            <tr>
	                <th>Arsip</th>
	                <th>Jenis Arsip</th>
	                <th>Seksi</th>
	                <th>Tanggal Rekam</th>
	            </tr>
	            </thead>
	            <tbody>
	            	@foreach ($arsips as $arsip)
	            <tr>
	                <td>{{ $arsip->arsip }}</td>
	                <td>{{ $arsip->jenis_arsip->jenis }}</td>
	                <td>{{ $arsip->seksi->seksi }}</td>
	                <td>{{ date('d F Y', strtotime($arsip->created_at)) }}</td>
	            </tr>
	            @endforeach
	            </tbody>
	        </table>
	    </div>
	</div>
</div>
@endsection