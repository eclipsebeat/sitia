@extends('layouts.master')

@section('content')
<div id="legend" style="margin-top:3em;margin-bottom:-20px">
	  {{--<legend class="">Daftar Arsip</legend>--}}
	  <a href="{{URL::to('lokasi/create/gudang')}}"><button class="btn-info btn">rekam gudang</button></a>
	  {{--<a href="{{URL::to('lokasi/create/seksi')}}"><button class="btn-info btn">rekam seksi</button></a>
	  <a href="{{URL::to('lokasi/create/rak')}}"><button class="btn-info btn">rekam rak</button></a>
	  <a href="{{URL::to('lokasi/create/box')}}"><button class="btn-info btn">rekam box</button></a>--}}
</div>
<div class='row'>
	<div class='col-md-6'>
		@include('lokasi.lokasi')
	</div>
	<div class='col-md-6'>
		@if((count($errors)>0) || Session::has('sukses'))
		<div class="row">
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			@if (Session::has('sukses'))
				<div class="alert alert-info">
					<strong>{{Session::get('sukses')}}</strong>.
				</div>
			@endif
		</div>
		@endif
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="panel panel-default">
					{{ Form::open(array('action' => 'LokasiController@store', 'class' => 'form')) }}
					<div class="form-group col-lg-12">
						{{ Form::hidden('target',$target) }}
						{{ Form::hidden('parentid',$parentid) }}
						{{ Form::label('lokasi', $target, array('class' => 'control-label')) }}
						{{ Form::text('lokasi', Form::old('lokasi'), 
								  array('required', 
										'class'=>'form-control', 
										'placeholder'=>'Nama Lokasi '.$target)) }}
					</div>
					<div class="form-group col-lg-12">  
						{{ Form::submit('Simpan!', 
						array('class'=>'btn btn-primary')) }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{{HTML::script('assets/js/tree.js')}}

@stop