@extends('layouts.master')

@section('content')
<div id="legend" style="margin-top:3em;margin-bottom:-20px">
	  {{--<legend class="">Daftar Arsip</legend>--}}
	  <a href="{{URL::to('lokasi/create/gudang')}}"><button class="btn-info btn">rekam gudang</button></a>
	  <a href="{{URL::to('lokasi/create/seksi')}}"><button class="btn-info btn">rekam seksi</button></a>
	  <a href="{{URL::to('lokasi/create/rak')}}"><button class="btn-info btn">rekam rak</button></a>
	  <a href="{{URL::to('lokasi/create/box')}}"><button class="btn-info btn">rekam box</button></a>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12">
		<div class="panel panel-default">
			<div class="tree well">
    <ul>
	@foreach($gudang as $gudang)
		<li><span><i class="glyphicon glyphicon-home"></i> gudang</span><a href=""> {{ strtoupper($gudang->gudang)}}</a>
			&nbsp;<a href="" title="edit"><span><i class="glyphicon glyphicon-edit"></i></span></a>
			&nbsp;<a href="" title="rekam seksi"><span><i class="glyphicon glyphicon-tasks"></i></span></a>
			<ul>
				@foreach($seksi as $key=>$value)
					@if($value->gudang_id==$gudang->id)
						<li><span><i class="glyphicon glyphicon-briefcase"></i> seksi</span><a  href=""> {{strtoupper($value->seksi)}}</a>
						&nbsp;<a href="" title="edit"><span><i class="glyphicon glyphicon-edit"></i></span></a>
						&nbsp;<a href="" title="rekam rak"><span><i class="glyphicon glyphicon-tasks"></i></span></a>
						<ul>
							@foreach($rak as $key=>$val)
								@if($val->seksi_id==$value->id)
									<li><span><i class="glyphicon glyphicon-tasks"></i> rak</span><a  href=""> {{strtoupper($val->rak)}}</a>
									&nbsp;<a href="" title="rak"><span><i class="glyphicon glyphicon-edit"></i></span></a>
									&nbsp;<a href="" title="rekam box"><span><i class="glyphicon glyphicon-tasks"></i></span></a>
									<ul>
										@foreach($box as $key=>$valu)
											@if($valu->rak_id==$val->id)
												<li><span><i class="glyphicon glyphicon-folder-open"></i> box</span><a> {{strtoupper($valu->box)}}</a></li>
												&nbsp;<a href="" title="box"><span><i class="glyphicon glyphicon-edit"></i></span></a>
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