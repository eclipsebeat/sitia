<div class="col-md-12 col-sm-12">
	<div class="panel panel-default">
  <!-- Default panel contents -->
	
  
	<table id="example1	" class="table table-striped table-bordered table-hover">
		<thead>
		<tr>
			<th>No</th>
			<th>Arsip</th>
			<th>User</th>
			<th>Status</th>
			<th>Tgl Pinjam</th>
			<th>Tgl Kembali</th>
			<th>Kembali</th>
		</tr>
		</thead>
		<tbody>
		@foreach ($pinjams as $pinjam)
		<tr>
			<td>{{ $no++ }}</td>
			<td>{{ $pinjam->arsip->arsip }}</td>
			<td>{{ $pinjam->user->nmdepan }} {{ $pinjam->user->nmbelakang }}</td>
			<td>
				@if($pinjam->status==2)
					<span><i class="glyphicon glyphicon-remove" title="dipinjam"></i></span>
				@else
					<span><i class="glyphicon glyphicon-ok" title="telah kembali"></i></span>
				@endif
			</td>
			<td>{{ $pinjam->time_pinjam }}</td>
			<td>{{ $pinjam->time_kembali }}</td>
			<td>
				@if($pinjam->status==2)
					<a href="{{URL::to('kembali/'.$pinjam->id) }}" class='confirm-kembali' judul="{{$pinjam->arsip->arsip}}" peminjam="{{$pinjam->user->nmdepan}} {{$pinjam->user->nmbelakang}}" tgl="{{$pinjam->time_pinjam}}"><span><i class="glyphicon glyphicon-edit" title="pengembalian arsip"></i></span></a>
				@else
					<span><i class="glyphicon glyphicon-remove" title="telah kembali"></i></span>
				@endif
			
			</td>
		</tr>
		@endforeach
		</tbody>
	</table>
  
</div>
</div>