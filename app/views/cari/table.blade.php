<div class="col-md-12 col-sm-12">
	<div class="panel panel-default">
  <!-- Default panel contents -->
	
  
	<table id="example1	" class="table table-striped table-bordered table-hover">
		<thead>
	        <tr>
	            <th>arsip</th>
	            <th>Jenis Arsip</th>
	            <th>Gudang</th>
	            <th>Seksi</th>
	            <th>Detail</th>
	        </tr>
	        </tr>
	        </thead>
	        <tbody>
			@foreach ($results as $row)
	        <tr>
	            <td>{{ $row->arsip }}</td>
	            <td>{{ $row->jenis_arsip->jenis }}</td>
	            <td>{{ $row->gudang->gudang }}</td>
	            <td>{{ $row->seksi->seksi }}</td>
	            <td><a href="{{ url('/arsip/') }}/{{ $row->id }}" data-original-title="Data Detail" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a></td>
	        </tr>
			@endforeach
	        </tbody>
	</table>
  
</div>
</div>