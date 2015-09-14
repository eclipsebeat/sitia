@extends('layouts.master')

@section('content')
<div class="rapi">

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
					{{ Form::open(array('action' => 'JenisArsipController@store', 'class' => 'form')) }}
					<div class="form-group col-lg-12">
						{{ Form::label('jenis arsip', 'Jenis Arsip', array('class' => 'control-label')) }}
						{{ Form::text('jenis', Form::old('jenis'), 
								  array('required', 
										'class'=>'form-control', 
										'placeholder'=>'Nama Jenis Arsip ')) 
						}}
						{{ Form::label('Retensi', 'Masa Berlaku (Retensi)', array('class' => 'control-label')) }}
						{{ Form::text('retensi',Form::old('retensi'),
							array('required', 
										'class'=>'form-control', 
										'placeholder'=>'Retensi / Masa berlaku arsip ')) 
						}}
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