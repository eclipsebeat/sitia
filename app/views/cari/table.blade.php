<div class="col-md-12 col-sm-12">
	<div class="panel panel-default">
  <!-- Default panel contents -->
	
  
	<table id="example1	" class="table table-striped table-bordered table-hover">
		<thead>
		<tr>
			<th>No</th>
			<th>Arsip</th>
			<th>Jenis Arsip</th>
			<th>Lokasi</th>
			<th>Aksi</th>
		</tr>
		</thead>
		<tbody>
		@foreach ($results as $result)
		<tr>
			<td>{{ $no++ }}</td>
			<td>{{ $result->arsip }} <span style="color:red">{{Pinjam::isPinjam($result->id)==true?'[dipinjam]':''}}</span></td>
			<td>{{ $result->jenis_arsip->jenis }}</td>
			<td>{{ $result->gudang->gudang }}.{{$result->seksi->seksi}}.{{$result->rak->rak}}.{{$result->box->box}}</td>
			<td></td>
		</tr>
		@endforeach
		</tbody>
	</table>
  
</div>
</div>