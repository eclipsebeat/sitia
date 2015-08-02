@extends('layouts.master')

@section('content')

<div class="rapi">

</div>
<div class="row">
	<div class="row" >
		<div class="col-md-12 col-sm-12">
			<a href="{{URL::to('jenisarsip/create')}}"><button class="btn btn-info">Rekam Jenis Arsip</button></a>
		</div>
	</div>
	<div class="row">
		@include('jenis_arsip.table');
	</div>
</div>
@stop