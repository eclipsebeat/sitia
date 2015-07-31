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
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="panel panel-default">
					<div class="tree well">
						<ul>
						@foreach($gudang as $gudang)
							<li><span><i class="glyphicon glyphicon-home"></i> gudang</span><a href=""> {{ strtoupper($gudang->gudang)}}</a>
								&nbsp;<a href="{{URL::to('lokasi/edit/gudang/'.$gudang->id)}}" title="edit"><span><i class="glyphicon glyphicon-edit"></i></span></a>
								&nbsp;<a href="{{URL::to('lokasi/create/seksi/'.$gudang->id)}}" title="rekam seksi"><span><i class="glyphicon glyphicon-tasks"></i></span></a>
								&nbsp;<a href="{{URL::to('lokasi/destroy/gudang/'.$gudang->id)}}" title="hapus"><span><i class="glyphicon glyphicon-trash"></i></span></a>
								<ul>
									@foreach($seksi as $key=>$value)
										@if($value->gudang_id==$gudang->id)
											<li><span><i class="glyphicon glyphicon-briefcase"></i> seksi</span><a  href=""> {{strtoupper($value->seksi)}}</a>
											&nbsp;<a href="{{URL::to('lokasi/edit/seksi/'.$value->id)}}" title="edit"><span><i class="glyphicon glyphicon-edit"></i></span></a>
											&nbsp;<a href="{{URL::to('lokasi/create/rak/'.$value->id)}}" title="rekam rak"><span><i class="glyphicon glyphicon-tasks"></i></span></a>
											&nbsp;<a href="{{URL::to('lokasi/destroy/seksi/'.$value->id)}}" title="hapus"><span><i class="glyphicon glyphicon-trash"></i></span></a>
											<ul>
												@foreach($rak as $key=>$val)
													@if($val->seksi_id==$value->id)
														<li><span><i class="glyphicon glyphicon-tasks"></i> rak</span><a  href=""> {{strtoupper($val->rak)}}</a>
														&nbsp;<a href="{{URL::to('lokasi/edit/rak/'.$val->id)}}" title="edit"><span><i class="glyphicon glyphicon-edit"></i></span></a>
														&nbsp;<a href="{{URL::to('lokasi/create/box/'.$val->id)}}" title="rekam box"><span><i class="glyphicon glyphicon-tasks"></i></span></a>
														&nbsp;<a href="{{URL::to('lokasi/destroy/rak/'.$val->id)}}" title="hapus"><span><i class="glyphicon glyphicon-trash"></i></span></a>
														<ul>
															@foreach($box as $key=>$valu)
																@if($valu->rak_id==$val->id)
																	<li><span><i class="glyphicon glyphicon-folder-open"></i> box</span><a> {{strtoupper($valu->box)}}</a></li>
																	&nbsp;<a href="{{URL::to('lokasi/edit/box/'.$valu->id)}}" title="edit"><span><i class="glyphicon glyphicon-edit"></i></span></a>
																	&nbsp;<a href="{{URL::to('lokasi/destroy/box/'.$valu->id)}}" title="hapus"><span><i class="glyphicon glyphicon-trash"></i></span></a>
																@endif
															@endforeach
														</ul>
														</li>
													@endif
												@endforeach
											</ul>
											</li>
										@endif
									@endforeach
								</ul>
							</li>
						@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
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
<script >
	$(function () {
    $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
    $('.tree li.parent_li > span').on('click', function (e) {
        var children = $(this).parent('li.parent_li').find(' > ul > li');
        if (children.is(":visible")) {
            children.hide('fast');
            $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
        } else {
            children.show('fast');
            $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
        }
        e.stopPropagation();
    });
});
</script>

@stop