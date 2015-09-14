@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="panel panel-default" style="margin:10px 0 10px 0">
		  <!-- Default panel contents -->
		  	<div class="panel-heading" >Daftar Arsip Terkini</div>
		  
	            <table id="example" class="table table-striped table-bordered table-hover">
	            <thead>
	            <tr>
	                <th>arsip</th>
	                <th>Jenis Arsip</th>
	                <th>Gudang</th>
	                <th>Seksi</th>
	                <th>Detail</th>
	            </tr>
	            </tr>
	            </thead>
	            <tbody>
				@foreach ($arsips as $arsip)
	            <tr>
	                <td>{{ $arsip->arsip }}</td>
	                <td>{{ $arsip->jenis_arsip->jenis }}</td>
	                <td>{{ $arsip->gudang->gudang }}</td>
	                <td>{{ $arsip->seksi->seksi }}</td>
	                <td><a href="{{ url('/arsip/') }}/{{ $arsip->id }}" data-original-title="Data Detail" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a></td>
	            </tr>
				@endforeach
	            </tbody>
	        </table>
	    </div>
	</div>
</div>
@endsection