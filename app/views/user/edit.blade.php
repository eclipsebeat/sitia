@extends('layouts.master')

@section('content')
	<div class="container-fluid" style="margin-top:3em;margin-bottom:-20px">
    <section class="container">
		<div class="col-md-12">
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
		<div class="row">
			{{ Form::model($user, array('action' => 'UserController@update', 'class' => 'form')) }}
				{{Form::hidden('id',null)}}
		    	<div class="form-group col-lg-6">
					{{ Form::label('nip', 'NIP', array('class' => 'control-label')) }}
					{{ Form::text('nip', null, 
				              array('required', 
				                    'class'=>'form-control')) }}
				</div>
				<div class="form-group col-lg-6">
					{{ Form::label('username', 'Username', array('class' => 'control-label')) }}
					{{ Form::text('username', null, 
				              array('required', 
				                    'class'=>'form-control', 'disabled' => 'disabled')) }}
				</div>
				<div class="form-group col-lg-6">
					{{ Form::label('nmdepan', 'Nama Depan', array('class' => 'control-label')) }}
					{{ Form::text('nmdepan', null, 
				              array('required', 
				                    'class'=>'form-control', 
				                    'placeholder'=>'Nama Depan')) }}
				</div>
				<div class="form-group col-lg-6">
					{{ Form::label('nmbelakang', 'Nama Belakang', array('class' => 'control-label')) }}
					{{ Form::text('nmbelakang', null, 
				              array('required', 
				                    'class'=>'form-control', 
				                    'placeholder'=>'Nama Belakang')) }}
				</div>
				<div style="text-align: center;">
			      <div class="form-group col-md-12">  
			          {{ Form::submit('Simpan!', 
			            array('class'=>'btn btn-primary')) }}
			      </div>
			    </div> 

			{{ Form::close() }}
		</div>
	</div>
</div>
@endsection