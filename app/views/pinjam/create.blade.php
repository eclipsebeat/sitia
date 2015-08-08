@extends('layouts.master')

@section('content')

<div class="rapi">
@if (Session::has('sukses'))
	<div class="alert alert-info">
		<strong>{{Session::get('sukses')}}</strong>.
	</div>
@endif
</div>
<div class="row">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="panel panel-default">
		  <!-- Default panel contents -->
			
		  
			<table id="example" class="table table-striped table-bordered table-hover">
				<thead> 
				<tr>
					<th>No</th>
					<th>Arsip</th>
					<th>Jenis Arsip</th>
					<th>Lokasi</th>
					<th>Status Pinjam</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($arsips as $arsip)
				<tr>
					<td>{{ $no++ }}</td>
					<td><a href="{{URL::to('arsip/doc/'.$arsip->files)}}" {{-- data-toggle="modal" data-target="#myModal" --}} class="fileview" ><span><i class="glyphicon glyphicon-folder-open" title="lihat file"></i></span>
					</a>&nbsp;{{ $arsip->arsip }}</td>
					<td>{{ $arsip->jenis_arsip->jenis }}</td>
					<td>{{ $arsip->gudang->gudang }}-{{$arsip->seksi->seksi}}-{{$arsip->rak->rak}}-{{$arsip->box->box}}</td>
					<td>
						@if(count($arsip->pinjam)==0 || $arsip->pinjam[count($arsip->pinjam)-1]->status==1)
							<a href="#" data-toggle="modal" data-target="#formModal" class="pinjamarsip" id="{{$arsip->id}}"><span><i class="glyphicon glyphicon-eye-open" title="peminjaman arsip"></i></span></a>
						@else
							<span><i class="glyphicon glyphicon-eye-close" title="telah dipinjam"></i></span>	
						@endif
					</td>
				</tr>
				@endforeach
				</tbody>
			</table>
		  
		</div>
		</div>
	</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body" id="pdfview">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Peminjaman Arsip</h4>
      </div>
      <div class="modal-body">
        <div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="">
					{{ Form::open(array('action' => 'PeminjamanController@store', 'class' => 'form','id'=>'formpinjam')) }}
					<div class="form-group col-lg-12">
						{{Form::hidden('id','',array('id'=>'id_arsip'))}}
						{{ Form::label('Peminjam', 'Peminjam', array('class' => 'control-label')) }}
						<select class="form-control" name="peminjam">
							@foreach($users as $user)
								<option value="{{$user->id}}">{{$user->nmdepan}} {{$user->nmbelakang}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-lg-12">  
						{{ Form::submit('Simpan!', 
						array('class'=>'btn btn-info pull-right')) }}
					</div>
				</div>
			</div>
		</div>
      </div>
    </div>
  </div>
</div>

@stop