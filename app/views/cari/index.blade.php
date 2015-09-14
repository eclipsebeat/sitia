@extends('layouts.master')

@section('content')
<div class="rapi">

</div>
<div class="row">
	<div class="row" >
		<div class="col-md-12 col-sm-12">
			<a href="{{URL::to('search/custom')}}"><button class="btn btn-info">Pencarian Lanjut</button></a>
		</div>
	</div>
	<div class="row">
		<div class="container-fluid">
			<section class="container">
				<div class="col-lg-12">
				{{ Form::open(array('action' => 'SearchController@store', 'class' => 'form')) }}
				<div class="input-group">
					
					{{ Form::text('search',null,array('required', 
				                    'class'=>'form-control', 
				                    'placeholder'=>'Cari Arsip')) }}
					<span class="input-group-btn">
						<input type="submit" class="btn btn-default" name="submit"><i class="glyphicon glyphicon-search"></i></submit>
					</span>
					
				</div>
				{{ Form::close() }}
				</div>
			</section>
		</div>
	</div>
</div>
<div class="rapi">

</div>

@stop