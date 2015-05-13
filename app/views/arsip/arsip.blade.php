@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="panel panel-default">
		  <!-- Default panel contents -->
		  	<div class="panel-heading">Daftar Arsip Terkini</div>
		  
	            <table id="example" class="table table-striped table-bordered table-hover">
	            <thead>
	            <tr>
	                <th>Seksi</th>
	                <th>arsip</th>
	                <th>Jenis Arsip</th>
	                <th>Gudang</th>
	                <th>Rak</th>
	                <th>Box</th>
	                <th>Petugas Rekam</th>
	                <th>Tanggal Rekam</th>
	            </tr>
	            </tr>
	            </thead>
	            <tbody>
				@foreach ($arsips as $arsip)
	            <tr>
	                <td>{{ $arsip->seksi_id }}</td>
	                <td>{{ $arsip->arsip }}</td>
	                <td>{{ $arsip->jenis_arsip_id }}</td>
	                <td>{{ $arsip->gudang_id }}</td>
	                <td>{{ $arsip->rak_id }}</td>
	                <td>{{ $arsip->box_id }}</td>
	                <td>{{ $arsip->user_id }}</td>
	                <td>{{ $arsip->created_at }}</td>
	            </tr>
				@endforeach
	            </tbody>
	        </table>
	    </div>
	</div>
</div>
@endsection