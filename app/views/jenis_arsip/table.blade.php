<div class="col-md-12 col-sm-12">
	<div class="panel panel-default">
  <!-- Default panel contents -->
	
  
	<table id="example1	" class="table table-striped table-bordered table-hover">
		<thead>
		<tr>
			<th>No</th>
			<th>Jenis</th>
			<th>Aksi</th>
		</tr>
		</thead>
		<tbody>
		@foreach ($jenisarsips as $jenisarsip)
		<tr>
			<td>{{ $no++ }}</td>
			<td>{{ $jenisarsip->jenis }}</td>
			<td><a href="{{URL::to('jenisarsip/'.$jenisarsip->id) }}" ><span><i class="glyphicon glyphicon-edit" title="ubah data jenis arsip"></i></span></a>
			<a href="{{URL::to('jenisarsip/destroy/'.$jenisarsip->id) }}"  class='confirm' ><span><i class="glyphicon glyphicon-trash"title="hapus data jenis arsip"></i></span></a>
			</td>
		</tr>
		@endforeach
		</tbody>
	</table>
  
</div>
</div>