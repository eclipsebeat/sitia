@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="panel panel-default">
		  <!-- Default panel contents -->
		  	<div class="panel-heading">Daftar User</div>
		  
	            <table id="example" class="table table-striped table-bordered table-hover">
	            <thead>
	            <tr>
	                <th>NIP</th>
	                <th>Username</th>
	                <th>Nama Depan</th>
	                <th>Nama Belakang</th>
	                <th>Kewenangan</th>
	                <th></th>
	                <th></th>
	            </tr>
	            </tr>
	            </thead>
	            <tbody>
				@foreach ($users as $user)
	            <tr>
	                <td>{{ $user->nip }}</td>
	                <td>{{ $user->username }}</td>
	                <td>{{ $user->nmdepan }}</td>
	                <td>{{ $user->nmbelakang }}</td>
	                <td> - </td>
	                <td><a href="user/{{ $user->id }}" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning">Ubah</a></td>
	                <td></td>
	            </tr>
				@endforeach
	            </tbody>
	        </table>
	    </div>
	</div>
</div>
@endsection