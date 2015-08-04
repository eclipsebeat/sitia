@extends('layouts.master')

@section('content')

<div class="rapi">
	<a href="{{URL::to('utility/backup')}}"><button class="btn-info btn">backup</button></a>
</div>
<div class="row">
	<div class="col-md-12">
		<span>Daftar file backupd</span>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<th>File Backup</th>
				<th>Restore</th>
				<th>Delete</th>
			</thead>
		</table>
	</div>
	
</div>
@stop