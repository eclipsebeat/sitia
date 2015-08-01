@extends('layouts.master')

@section('content')
	<div class="row" style="margin-top:3em;margin-bottom:-20px">
		<div class="col-md-12 col-sm-12">
			<a href="{{URL::to('user/rekam')}}"><button class="btn btn-info">Rekam User</button></a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="panel panel-default">
		  <!-- Default panel contents -->
		  	<div class="panel-heading">Daftar User</div>
		  
	            <table id="example1	" class="table table-striped table-bordered table-hover">
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
	                <td><a href="{{URL::to('user/'.$user->id) }}" ><span><i class="glyphicon glyphicon-edit" title="ubah data user"></i></span></a>
					@if($user->role!=1)
						<a href="{{URL::to('user/destroy/'.$user->id) }}"  class='confirm' ><span><i class="glyphicon glyphicon-trash"title="hapus data user"></i></span></a>
					@endif
					</td>
	            </tr>
				@endforeach
	            </tbody>
	        </table>
	      
	    </div>
	</div>
</div>
@endsection