@extends('layouts.master')

@section('content')
<div id="legend" class="rapi">
	 
	  <a href="{{URL::to('jenisarsip/create')}}"><button class="btn-info btn">rekam jenis arsip</button></a>
	  
</div>
<div class='row'>
	<div class='col-md-6'>
		@include('jenis_arsip.table')
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
					{{ Form::model($jenisarsip,array('action' => 'JenisArsipController@update', 'class' => 'form')) }}
					{{Form::hidden('id',$jenisarsip->id)}}
					<div class="form-group col-lg-12">
						{{ Form::label('jenis arsip', 'Jenis Arsip', array('class' => 'control-label')) }}
						{{ Form::text('jenis', Form::old('jenis'), 
								  array('required', 
										'class'=>'form-control', 
										'placeholder'=>'Nama Jenis Arsip ')) }}
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

@stop