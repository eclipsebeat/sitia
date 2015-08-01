<div class="row">
	<div class="col-md-12 col-sm-12">
		<div class="panel panel-default">
			<div class="tree well">
				<ul>
				@foreach($gudang as $gudang)
					<li><span><i class="glyphicon glyphicon-home"></i> gudang</span><a href=""> {{ strtoupper($gudang->gudang)}}</a>
						&nbsp;<a href="{{URL::to('lokasi/edit/gudang/'.$gudang->id)}}" title="edit"><span><i class="glyphicon glyphicon-edit"></i></span></a>
						&nbsp;<a href="{{URL::to('lokasi/create/seksi/'.$gudang->id)}}" title="rekam seksi"><span><i class="glyphicon glyphicon-tasks"></i></span></a>
						&nbsp;<a href="{{URL::to('lokasi/destroy/gudang/'.$gudang->id)}}"  class='confirm' title="hapus"><span><i class="glyphicon glyphicon-trash"></i></span></a>
						<ul>
							@foreach($seksi as $key=>$value)
								@if($value->gudang_id==$gudang->id)
									<li><span><i class="glyphicon glyphicon-briefcase"></i> seksi</span><a  href=""> {{strtoupper($value->seksi)}}</a>
									&nbsp;<a href="{{URL::to('lokasi/edit/seksi/'.$value->id)}}" title="edit"><span><i class="glyphicon glyphicon-edit"></i></span></a>
									&nbsp;<a href="{{URL::to('lokasi/create/rak/'.$value->id)}}" title="rekam rak"><span><i class="glyphicon glyphicon-tasks"></i></span></a>
									&nbsp;<a href="{{URL::to('lokasi/destroy/seksi/'.$value->id)}}"  class='confirm' title="hapus"><span><i class="glyphicon glyphicon-trash"></i></span></a>
									<ul>
										@foreach($rak as $key=>$val)
											@if($val->seksi_id==$value->id)
												<li><span><i class="glyphicon glyphicon-tasks"></i> rak</span><a  href=""> {{strtoupper($val->rak)}}</a>
												&nbsp;<a href="{{URL::to('lokasi/edit/rak/'.$val->id)}}" title="edit"><span><i class="glyphicon glyphicon-edit"></i></span></a>
												&nbsp;<a href="{{URL::to('lokasi/create/box/'.$val->id)}}" title="rekam box"><span><i class="glyphicon glyphicon-tasks"></i></span></a>
												&nbsp;<a href="{{URL::to('lokasi/destroy/rak/'.$val->id)}}"  class='confirm' title="hapus"><span><i class="glyphicon glyphicon-trash"></i></span></a>
												<ul>
													@foreach($box as $key=>$valu)
														@if($valu->rak_id==$val->id)
															<li><span><i class="glyphicon glyphicon-folder-open"></i> box</span><a> {{strtoupper($valu->box)}}</a></li>
															&nbsp;<a href="{{URL::to('lokasi/edit/box/'.$valu->id)}}" title="edit"><span><i class="glyphicon glyphicon-edit"></i></span></a>
															&nbsp;<a href="{{URL::to('lokasi/destroy/box/'.$valu->id)}}" class='confirm' title="hapus"><span><i class="glyphicon glyphicon-trash"></i></span></a>
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
