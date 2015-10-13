@extends('layouts.master')

@section('content')

@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

<div class="rapi">
	<a href="{{URL::to('utility/backup')}}"><button class="btn-info btn">backup</button></a>
</div>
<div class="row">
	<div class="col-md-12">
		<span>Daftar file backupd</span>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<th>File Backup</th>
				<th>User</th>
				<th>Tanggal BackUp</th>
				<th>Restore</th>
				<th>Delete</th>
			</thead>
			<tbody>
				@foreach ($utility as $row)
	            <tr>
	                <td>{{ $row->backup }}</td>
	                <td>{{ $row->users->username }}</td>
	                <td>{{ date('d F Y', strtotime($row->created_at)) }}</td>
	                <td><a href="{{URL::to('user/'.$user->id) }}" ><span><i class="glyphicon glyphicon-edit" title="Restore"></i></span></a>
	                <td><a href="{{URL::to('utility/destroy/'.$user->id) }}"  class='confirm' ><span><i class="glyphicon glyphicon-trash"title="hapus database"></i></span></a></td>
	            </tr>
	            @endforeach
	            </tbody>
		</table>
	</div>
	
</div>
@stop