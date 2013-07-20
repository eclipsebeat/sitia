<?php
/**
 * @author freaksmj
 */
include_once ("topbar.php");
include_once ('../controller/jenisarsipController.php');
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Admin Area - RUH Jenis Arsip</title>
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
				<li class="dropdown active">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-th"></i>
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
							<a tabindex="-1" href="jenisarsip.php">Daftar Jenis Arsip</a>
							<!-- <ul class="dropdown-menu">
							<li><a href="jenisarsip.php">Daftar Jenis Arsip</a></li>
							 <li><a href="jenisarsip.php?modul=tambah">Rekam Jenis Arsip</a></li> 
							</ul> -->
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
							<li><a href="spj_bendum.php">Daftar SPJ Bendum</a></li>							
							<li><a href="spj_bendum.php?modul=tambah">Rekam SPJ Bendum</a></li>							
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
				
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-briefcase icon-white"></i>
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
				<h2>RUH Jenis Arsip</h2>
				<p>Pada menu ini Admin dapat melihat, merekam, merubah dan menghapus Jenis Arsip.</p>
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
			<legend class=""><a href="jenisarsip.php">Daftar Jenis Arsip</a></legend>
		</div>
			
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
		<thead>
			<tr>
				<th>Jenis Arsip</th>
				<th>Retensi(th)</th>
				<th>Uraian</th>
				<th>Perubahan Terakhir</th>
				<th>Ubah</th>
				<!-- <th>Hapus</th> -->
			</tr>
		</thead>
		<tbody>
		<?php
			if($all!=0){
			foreach($all as $display){
				echo "<tr>";
				echo "<td>".$display['nama_jenisarsip']."</td>";
				echo "<td>".$display['masa_retensi']."</td>";
				echo "<td>".$display['uraian']."</td>";
				echo "<td>".$display['last_update']."</td>";
				echo "<td>
						<a href=\"jenisarsip.php?modul=ubah&id=".$display['jenisarsip_id']."\">
						<i class=\"icon-edit\"></i>
						<span>Ubah</span>        					
						</a>
					  </td>";
				/**echo "<td>
						<a href=\"jenisarsip.php?delete=".$display['jenisarsip_id']."\" data-confirm='Anda Yakin Akan menghapus Jenis Arsip : ".$display['nama_jenisarsip']." ?'>
						<i class=\"icon-remove-sign\"></i>
						<span>Hapus</span>        					
						</a>
					  </td>";*/
			}
		?>
		</tbody>

		<?php
			}else{
				echo "<div class=\"alert alert-error\">
						Data Tidak Ditemukan
						<buttontype=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
					  </div>";
			}
		?>
		</table>
		
	</div> <!-- /.container -->

</div> <!-- /#content -->
<?php
break;

case "tambah":
?>

<div id="content">
	<div class="container">

			<form class="form-horizontal" action="#" method="post">
			  <fieldset>
				<div id="legend">
				  <legend class="">Rekam Jenis Arsip</legend>
				</div>
<?php

	if(isset($error_rekam)){
		echo '<div class="alert alert-error" id="alert">'.$error_rekam.'
			  <button type="button" class="close" data-dismiss="alert" id=""close">x</button>
			  </div>';
	}
	if(isset($success)){
		echo '<div class="alert alert-success">'.$success.'
			  <button type="button" class="close" data-dismiss="alert" id=""close">x</button>
			  </div>';
	}else{
?>				
				<div class="control-group">
				  <!-- Nama Jenis Arsip -->
				  <label class="control-label"  for="nama">Nama Jenis Arsip</label>
				  <div class="controls">
					<input type="text" id="nama" name="nama" placeholder="Nama Jenis Arsip" class="input-xlarge">
					<p class="help-block">Jenis Arsip</p>
				  </div>
				</div>
				<div class="control-group">
				  <!-- Retensi-->
				  <label class="control-label" for="retensi">Retensi</label>
				  <div class="controls">
					<input type="number" id="retensi" name="retensi" placeholder="Masa Retensi" class="input-xlarge">
					<p class="help-block">Sesuaikan dengan Jadwal Retensi Arsip</p>
				  </div>
				</div>
				<div class="control-group">
				  <!-- Uraian -->
				  <label class="control-label"  for="uraian">Uraian Jenis Arsip</label>
				  <div class="controls">
					<!--<input type="textarea" id="nama" name="nama" placeholder="Nama Jenis Arsip" class="input-xlarge">-->
					<textarea rows="5" name="uraian" class="input-xlarge focused"></textarea>
					<p class="help-block">Jenis Arsip</p>
				  </div>
				</div>
				<div class="control-group">
				  <!-- Button -->
				  <div class="controls">
					<button type="submit" class="btn btn-primary" name="rekam_jenisarsip" id="daftar_btn">Rekam</button>
					<input type="button" class="btn btn-secondary" id="batal_btn" onclick="window.self.history.back()" value="Batal">
				  </div>
				</div>
			  </fieldset>
			</form>

	</div> <!-- /.container -->
</div> <!-- /#content -->
</div>
<?php
}
break;
case "ubah":
?>
<div id="content">
	<div class="container">

			<form class="well form-horizontal" action="#" method="post">
			  <fieldset>
				<div id="legend">
				  <legend class="">Ubah Jenis Arsip</legend>
				</div>
<?php

	if(isset($error_rekam)){
		echo '<div class="alert alert-error" id="alert">'.$error_rekam.'
			  <button type="button" class="close" data-dismiss="alert" id=""close">x</button>
			  </div>';
	}
	if(isset($success)){
		echo '<div class="alert alert-success">'.$success.'
			  <button type="button" class="close" data-dismiss="alert" id=""close">x</button>
			  </div>';
	}else{
		foreach($ubah as $display){
?>				
				<input name="id_ubah" id="id_ubah" type="hidden" value="<?php echo $_GET['id']; ?>" />					 
				<div class="control-group">
				  <!-- Nama Jenis Arsip -->
				  <label class="control-label"  for="nama">Nama Jenis Arsip</label>
				  <div class="controls">
					<input type="text" id="nama" name="nama" placeholder="Nama Jenis Arsip" class="input-xlarge" value="<?php echo $display['nama_jenisarsip']; ?>">
				  </div>
				</div>
				<div class="control-group">
				  <!-- Retensi-->
				  <label class="control-label" for="retensi">Retensi (th)</label>
				  <div class="controls">
					<input type="number" id="retensi" name="retensi" placeholder="Masa Retensi" style="width: 50px; padding: 1px" value="<?php echo $display['masa_retensi']; ?>">
				  </div>
				</div>
				<div class="control-group">
				  <!-- Uraian -->
				  <label class="control-label"  for="uraian">Uraian Jenis Arsip</label>
				  <div class="controls">
					<textarea rows="5" name="uraian" class="input-xlarge focused"><?php echo $display['uraian']; ?></textarea>
				  </div>
				</div>
				<div class="control-group">
				  <!-- Button -->
				  <div class="controls">
					<button type="submit" class="btn btn-primary" name="update_jenisarsip" id="update_btn">Simpan</button>
					<input type="button" class="btn btn-secondary" id="batal_btn" onclick="window.self.history.back()" value="Batal">
				  </div>
				</div>
			  </fieldset>
			</form>

	</div> <!-- /.container -->
</div> <!-- /#content -->
</div>
<?php
}
}
break;
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
			
			$('a[data-confirm]').click(function(ev) {
				var href = $(this).attr('href');

				if (!$('#dataConfirmModal').length) {
					$('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Konfirmasi Hapus</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button><a class="btn btn-danger" id="dataConfirmOK">Ya</a></div></div>');
				} 
				$('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
				$('#dataConfirmOK').attr('href', href);
				$('#dataConfirmModal').modal({show:true});
				return false;
			});
        });

</script>