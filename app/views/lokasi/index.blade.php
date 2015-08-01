@extends('layouts.master')

@section('content')
<div id="legend" style="margin-top:3em;margin-bottom:-20px">
	  {{--<legend class="">Daftar Arsip</legend>--}}
	  <a href="{{URL::to('lokasi/create/gudang')}}"><button class="btn-info btn">rekam gudang</button></a>
	  {{--<a href="{{URL::to('lokasi/create/seksi')}}"><button class="btn-info btn">rekam seksi</button></a>
	  <a href="{{URL::to('lokasi/create/rak')}}"><button class="btn-info btn">rekam rak</button></a>
	  <a href="{{URL::to('lokasi/create/box')}}"><button class="btn-info btn">rekam box</button></a>--}}
</div>
@include('lokasi.lokasi')
{{HTML::script('assets/js/tree.js')}}
@stop