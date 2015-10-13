@extends('layouts.master')

@section('content')

<div class="rapi">

</div>
<div class="row">
	<div class="row">
		<div class="container-fluid">
			<section class="container">
				<div class="col-lg-12">
				{{ Form::open(array('action' => 'SearchController@show', 'class' => 'form')) }}
				<div class="input-group">
					<div class="col-md-4"> 
					{{ Form::select('select', 
									array('1' => 'Nama Arsip', 
										  '2' => 'Nama File',
										  '3' => 'Jenis Arsip',
										  '4' => 'Gudang',
										  '5' => 'Nomor Rak',
										  '6' => 'Nomor Box',
										  '7' => 'Seksi',
										  '8' => 'Nama Perekam'), null, ['class'=>'form-control']) }}
					</div>
					
					<div class="col-md-8"> 
					{{ Form::text('search',null,array('required', 
				                    'class'=>'form-control', 
				                    'placeholder'=>'Cari Arsip')) }}

					</div>
					<span class="input-group-btn">
						<input type="submit" class="btn btn-default" name="submit"><i class="glyphicon glyphicon-search"></i></submit>
					</span>
				</div>
				{{ Form::close() }}
				</div>
			</section>
		</div>
		@if(isset($results))
			<div class="row">
				@include('cari.table');
			</div>
		@endif
	</div>
</div>
@stop