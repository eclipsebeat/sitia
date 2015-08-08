@extends('layouts.master')

@section('content')

<div class="rapi">
@if (Session::has('sukses'))
	<div class="alert alert-info">
		<strong>{{Session::get('sukses')}}</strong>.
	</div>
@endif
</div>
<div class="row">
	<div class="row" >
		<div class="col-md-12 col-sm-12">
			<a href="{{URL::to('pinjam/create')}}"><button class="btn btn-info">Rekam Peminjaman</button></a>
		</div>
	</div>
	<div class="row">
		@include('pinjam.table');
	</div>
</div>

@stop