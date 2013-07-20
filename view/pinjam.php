<?php
/**
 * @author freaksmj
 */
include ("topbar.php");
include_once ('../controller/pinjamController.php');
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Peminjaman Arsip</title>
   <!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="../includes/css/bootstrap.css">
	<link type="text/css" rel="stylesheet" href="../includes/css/application.css">
	<link type="text/css" rel="stylesheet" href="../includes/datepicker/css/datepicker.css">
	<link type="text/css" rel="stylesheet" href="../includes/DT/css/DT_bootstrap.css">
	
	<script type="text/javascript" src="../includes/js/bootstrap.js"></script>
	<script type="text/javascript" src="../includes/js/jquery.js"></script>
	<script type="text/javascript" src="../includes/js/bootstrap-dropdown.js"></script>
	<script type="text/javascript" src="../includes/datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="../includes/js/bootstrap-modal.js"></script>
	<script type="text/javascript" src="../includes/DT/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="../includes/DT/js/DT_bootstrap.js"></script>

 </head>
<body>

<!-- /#header -->

<div id="header">
	
	<div class="container">
		
		<a href="index.php" class="brand">Dashboard Admin</a>
		
		<div class="nav-collapse">
			<ul id="main-nav" class="nav pull-right">
				<li>
					<a href="index.php">
						<i class="icon-home icon-white"></i>
						<span>Home</span>        					
					</a>
				</li>
				<?php
				if(isset($_SESSION['login'])&& $_SESSION['level']==1){ 
				
				?>
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-th icon-white"></i>
						<span>Admin</span> 
						<b class="caret"></b>
					</a>	
					<ul class="dropdown-menu">
						<li class="dropdown-submenu">
							<a tabindex="-1" href="#">RUH User</a>
							<ul class="dropdown-menu">
							<li><a href="user.php?">Daftar User</a></li>
							<li><a href="user.php?modul=tambah">Rekam User</a></li>
							</ul>
						</li>
						<li class="dropdown-submenu">
							<a tabindex="-1" href="#">Daftar Jenis Arsip</a>
							<!-- <ul class="dropdown-menu">
							<li><a href="jenisarsip.php">Daftar Jenis Arsip</a></li>
							<li><a href="jenisarsip.php?modul=tambah">Rekam Jenis Arsip</a></li>
							</ul>-->
						</li>
						<li class="dropdown-submenu">
							<a tabindex="-1" href="#">RUH Lokasi</a>
							<ul class="dropdown-menu">
							<li><a href="ruang.php">Daftar Lokasi</a></li>
							<li><a href="ruang.php?modul=tambah">Rekam Lokasi</a></li>
							</ul>
						</li>
						<li class="dropdown-submenu">
							<a tabindex="-1" href="utility.php">Utility</a>
						</li>
					</ul>
				</li>
				<?php
				}
				?>
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-file icon-white"></i>
						<span>RUH Arsip</span> 
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">
						<li class="dropdown-submenu">
						<a tabindex="-1" href="#">Surat Masuk</a>
							<ul class="dropdown-menu">
							<li><a href="suratmasuk.php">Daftar Surat Masuk</a></li>							
							<li><a href="suratmasuk.php?modul=tambah">Rekam Surat Masuk</a></li>							
							</ul>
						</li>
						<li class="dropdown-submenu">
						<a tabindex="-1" href="#">Surat Keluar</a>
							<ul class="dropdown-menu">
							<li><a href="suratkeluar.php">Daftar Surat Keluar</a></li>							
							<li><a href="suratkeluar.php?modul=tambah">Rekam Surat Keluar</a></li>							
							</ul>
						</li>
						<li class="dropdown-submenu">
						<a tabindex="-1" href="#">SP2D</a>
							<ul class="dropdown-menu">
							<li><a href="sp2d.php">Daftar SP2D</a></li>							
							<li><a href="sp2d.php?modul=load_sp2d">Load SP2D</a></li>
							<li><a href="sp2d.php?modul=view_sp2d">Rekam SP2D</a></li>							
							</ul>
						</li>
						<li class="dropdown-submenu">
						<a tabindex="-1" href="#">Laporan Pertanggungjawaban Penerimaan dan Pengeluaran Negara</a>
							<ul class="dropdown-menu">
							<li><a href="spj_bendum.php">Daftar Laporan Pertanggungjawaban Penerimaan dan Pengeluaran Negara</a></li>							
							<li><a href="spj_bendum.php?modul=tambah">Rekam Laporan Pertanggungjawaban Penerimaan dan Pengeluaran Negara</a></li>							
							</ul>
						</li>
						<li class="dropdown-submenu">
						<a tabindex="-1" href="#">Laporan Keuangan Pemerintah Pusat</a>
							<ul class="dropdown-menu">
							<li><a href="lkpp.php">Daftar Laporan Keuangan Pemerintah Pusat</a></li>							
							<li><a href="lkpp.php?modul=tambah">Rekam Laporan Keuangan Pemerintah Pusat</a></li>							
							</ul>
						</li>
					</ul>    				
				</li>
				
				<li class="dropdown active">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-briefcase"></i>
						<span>Peminjaman Arsip</span> 
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">							
						<li><a href="pinjam.php">Peminjaman Arsip</a></li>
						<li><a href="pinjam.php?modul=kembali">Pengembalian Arsip</a></li>
					</ul>    				
				</li>
				
				<li class="dropdown">					
					<a href="search.php">
						<i class="icon-search icon-white"></i>
						<span>Pencarian Arsip</span> 
						<b class="caret"></b>
					</a>	
				</li>
				
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-tasks icon-white"></i>
						<span>Laporan</span> 
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">
						<li><a href="laporan.php">Peminjaman Arsip</a></li>
						<li class="dropdown-submenu">
							<a tabindex="-1" href="#">Status Arsip</a>
							<ul class="dropdown-menu">
							<li><a href="laporan.php?modul=arsipAktif">Arsip Aktif</a></li>
							<li><a href="laporan.php?modul=arsipInAktif">Arsip Inaktif</a></li>
							<li><a href="laporan.php?modul=arsipMusnah">Arsip Musnah</a></li>
							</ul>
						</li>
					</ul>   				
				</li>
				
			</ul>
			
		</div> <!-- /.nav-collapse -->

	</div> <!-- /.container -->
	
</div> <!-- /#header -->

<!-- /#masthead -->

<div id="masthead">
	
	<div class="container">
		
		<div class="masthead-pad">
			
			<div class="masthead-text">
				<h2>Peminjaman Arsip</h2>
				<p>Pada menu ini User Dapat Melakukan Peminjaman dan Pengembalian Arsip</p>
			</div> <!-- /.masthead-text -->
			
		</div>
		
	</div> <!-- /.container -->	
	
</div> <!-- /#masthead -->


<?php

$modul=$_GET['modul'];
$id=$_GET['id'];
switch($modul){
    
    default :
?>

<div id="content">

	<div class="container">
	<div id="legend">
	  <legend class="">Daftar Arsip</legend>
	</div>

	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
	<thead>
		<tr>
			<th rowspan="2"><center>Nama Arsip</center></th>
			<th colspan="4"><center>Lokasi</center></th>
			<th rowspan="2">Pinjam</th>
		</tr>
		<tr>
			<th><center>Ruang</center></th>
			<th>Rak</th>
			<th>Baris</th>
			<th>Box</th>
		</tr>
	</thead>
	<tbody>
<?php
	if($all!=0){
	foreach($all as $display){
	
			echo "<tr>";
			echo "<td>".$display['nama_arsip']."</a></td>";//namaarsip //lom bs link k detail tiap jenis arsip  
			echo "<td>".$display['nama_ruang']."</td>";//ruang
			echo "<td>".$display['rak']."</td>";//rak
			echo "<td>".$display['baris']."</td>";//baris
			echo "<td>".$display['box']."</td>";//box
			echo "<td>
					<a href=\"pinjam.php?modul=tambah&id=".$display['arsip_id']."\">
						<i class=\"icon-edit\"></i>
						<span>Pinjam</span>       					
					</a>
				  </td>";
	}

	}else{
		echo "<div class=\"alert alert-error\">
			   Data Tidak Ada
			  <buttontype=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
			  </div>";
	}
?>
</table>
		</div>
		
	</div> <!-- /.container -->

</div> <!-- /#content -->

<!-- view tambah Pinjam -->
<?php
break;

case "tambah":
?>

<div id="content">
	<div class="container">

			<form class="well form-horizontal" action="#" method="post" enctype="multipart/form-data">
			<fieldset>
				<div id="legend">
					<legend class="">Rekam Peminjaman Arsip</legend>
				</div>
<?php

	if(isset($error_rekam)){
		echo '<div class="alert alert-error" id="alert">'.$error_rekam.'
			  <button type="button" class="close" data-dismiss="alert" id="close">x</button>
			  </div>';
	}
	if(isset($success)){
		echo '<div class="alert alert-success">'.$success.'
			  <button type="button" class="close" data-dismiss="alert" id="close">x</button>
			  </div>';
	}else{
			
	foreach($ubah as $display){
?>				
	<div class="row">
		<div class="span4">
			<!-- tambah nama-->
			<input name="username" id="username" type="hidden" value="<?php echo " ".$_SESSION['username']." "; ?>" />

			<input name="id_user" id="id_user" type="hidden" value="<?php echo " ".$_SESSION['login']." "; ?>" />		
			<input name="id_ubah" id="id_ubah" type="hidden" value="<?php echo $_GET['id']; ?>" />
			<div class="control-group">
				<!-- Nama Arsip -->
				<label class="control-label"  for="nama">Nama Arsip</label>
				<div class="controls">
					<input type="text" id="nama" name="nama" placeholder="Nama Arsip" class="span3" value="<?php echo $display['nama_arsip'];?>" readonly>
				</div>
			</div>
			<div class="control-group">
				<!-- Ruang Arsip -->
				<label class="control-label"  for="ruang">Ruang Arsip</label>
				<div class="controls">
					<input type="text" id="ruang" name="ruang" placeholder="Ruang Arsip" class="span3" value="<?php echo $display['nama_ruang'];?>" readonly>
				</div>
			</div>
			<div class="control-group">
				<!-- lokasi -->
				<label class="control-label" for="lokasi">Lokasi</label>
				<div class="controls">
					<tr>
						<td>Rak</td>
						<td>
							<input type="number" name="rak" style="width: 30px; padding: 1px" value="<?php echo $display['rak'];?>" readonly> 
						</td>
						<td>Baris</td>
						<td>
							<input type="number" name="baris" style="width: 30px; padding: 1px" value="<?php echo $display['baris'];?>" readonly> 
						</td>
						<td>Box</td>
						<td>
							<input type="number" name="box" style="width: 30px; padding: 1px" value="<?php echo $display['box'];?>" readonly> 
						</td>
					</tr>
				</div>
			</div>
			
			<div class="control-group">
			<!-- Tanggal -->
				<label class="control-label"  for="nosurat">Tanggal Akhir Pinjam</label>
				<div class="controls prepend date" id="dp3" data-date="<?php $date=date("Y-m-d");echo $date?>" data-date-format="yyyy-mm-dd">
					<input class="span2" type="text" name="tgl_akhir" >
					<span class="add-on"><i class="icon-calendar"></i></span>
				</div>
			</div>
			
			<div class="control-group">
				<!-- Uraian -->
				<label class="control-label" for="uraian">Uraian</label>
				<div class="controls">
					<textarea rows="6" name="uraian" class="input-xlarge"></textarea>
				</div>
			</div>				
			<div class="control-group">
				<!-- Button -->
				<div class="controls">
					<button type="submit" class="btn btn-primary" name="rekam_pinjam" id="rekam_btn">Pinjam</button>
					<input type="button" class="btn btn-secondary" id="batal_btn" onclick="window.self.history.back()" value="Batal">
				</div>
			</div>
		</div>
	</div>
			</fieldset>
		</form>
		</div>
		</div>
	</div> <!-- /.container -->
</div> <!-- /#content -->


<?php
}
}
break;
case "kembali":
?>
<div id="content">

	<div class="container">
	<div id="legend">
	  <legend class="">Daftar Arsip</legend>
	</div>
		
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
	<thead>
		<tr>
			<th rowspan="2"><center>Nama Arsip</center></th>
			<th colspan="4"><center>Lokasi</center></th>
			<th rowspan="2">Kembali</th>
		</tr>
		<tr>
			<th><center>Ruang</center></th>
			<th>Rak</th>
			<th>Baris</th>
			<th>Box</th>
		</tr>
	</thead>
	<tbody>
<?php
	if($view_pinjam!=0){
	foreach($view_pinjam as $display){
		if (isset($_SESSION['login'])==$display['user_id']){
			echo "<tr>";
			echo "<td>".$display['nama_arsip']."</td>";//namaarsip   
			echo "<td>".$display['nama_ruang']."</td>";//ruang
			echo "<td>".$display['rak']."</td>";//rak
			echo "<td>".$display['baris']."</td>";//baris
			echo "<td>".$display['box']."</td>";//box
			echo "<td>
					<a href=\"pinjam.php?kembali=".$display['pinjam_id']."&id=".$display['arsip_id']."\" data-confirm='Pastikan Anda Sudah Mengembalikan Arsip : ".$display['nama_arsip']." Pada Tempatnya'>
						<i class=\"icon-edit\"></i>
						<span>Kembali</span>       					
					</a>
				  </td>";
		}		  
	}

	}else{
		echo "<div class=\"alert alert-error\">
				Data Tidak Ada
				<buttontype=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
			  </div>";
	}
?>
</table>
		</div>
		
	</div> <!-- /.container -->

</div> <!-- /#content -->
		
<?php
}
?>
</div>
</div>
<?php
include("footer.php");
?>

<script type="text/javascript">

$(document).ready(function () {
            $('.dropdown-toggle').dropdown();
			
			$('#dp3').datepicker();
			
			$('a[data-confirm]').click(function(ev) {
				var href = $(this).attr('href');

				if (!$('#dataConfirmModal').length) {
					$('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h3 id="dataConfirmLabel">Konfirmasi Pengembalian Arsip</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button><a class="btn btn-primary" id="dataConfirmOK">Ya</a></div></div>');
				} 
				$('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
				$('#dataConfirmOK').attr('href', href);
				$('#dataConfirmModal').modal({show:true});
				return false;
			});
			
			$('#preview').on('show', function(event){
				name = $(this).data('modal').options.id
				$(this).find('.id').html(name)
			});
			
        });

</script>