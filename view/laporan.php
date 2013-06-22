<?php
/**
 * @author freaksmj
 */
include ("topbar.php");
include_once ('../controller/laporanController.php');
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Laporan Arsip</title>
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
							<a tabindex="-1" href="#">RUH Jenis Arsip</a>
							<ul class="dropdown-menu">
							<li><a href="jenisarsip.php">Daftar Jenis Arsip</a></li>
							<li><a href="jenisarsip.php?modul=tambah">Rekam Jenis Arsip</a></li>
							</ul>
						</li>
						<li class="dropdown-submenu">
							<a tabindex="-1" href="#">RUH Lokasi</a>
							<ul class="dropdown-menu">
							<li><a href="ruang.php">Daftar Lokasi</a></li>
							<li><a href="ruang.php?modul=tambah">Rekam Lokasi</a></li>
							</ul>
						</li>
						<li class="dropdown-submenu">
							<a tabindex="-1" href="#">Utility</a>
							<ul class="dropdown-menu">
							<li><a href="#">Backup</a></li>
							<li><a href="#">Restore</a></li>
							</ul>
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
				
				<li class="dropdown active">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-tasks"></i>
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
				<p>Pada menu ini User Dapat Melihat Laporan Peminjaman Arsip dan Laporan Status Arsip</p>
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
<!-- view Laporan Peminjaman Arsip -->
<div id="content">

	<div class="container">
		<div id="legend">
		  <legend class="">Laporan Peminjaman Arsip</legend>
		</div>

		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
		<thead>
			<tr>
				<th><center>Jenis Arsip</center></th>
				<th><center>Nama Arsip</center></th>
				<th><center>Peminjam</center></th>
				<th><center>Uraian</center></th>
				<th><center>Tanggal Pinjam</center></th>
				<th><center>Tanggal Kembali</center></th>
			</tr>
		</thead>
		<tbody>
	<?php
		if($all_pinjam!=0){
			foreach($all_pinjam as $display){	
				echo "<tr>";
				echo "<td>".$display['nama_jenisarsip']."</a></td>";  
				echo "<td>".$display['nama_arsip']."</td>";
				echo "<td>".$display['username']."</td>";
				echo "<td>".$display['uraian']."</td>";
				echo "<td>".$display['tgl_pinjam']."</td>";
				echo "<td>".$display['tgl_kembali']."</td>";
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
break;

case "arsipAktif":
?>
<!-- view Laporan Arsip Aktif -->
<div id="content">

	<div class="container">
		<div id="legend">
		  <legend class="">Laporan Status Arsip Aktif</legend>
		</div>

		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
		<thead>
			<tr>
				<th rowspan="2"><center>Jenis Arsip</center></th>
				<th rowspan="2"><center>Nama Arsip</center></th>
				<th rowspan="2"><center>Tanggal Arsip</center></th>
				<th colspan="4"><center>Lokasi</center></th>
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
		if($all_aktif!=0){
			foreach($all_aktif as $display){	
				echo "<tr>";
				echo "<td>".$display['nama_jenisarsip']."</a></td>";  
				echo "<td>".$display['nama_arsip']."</td>";
				echo "<td>".$display['tgl']."</td>";
				echo "<td>".$display['nama_ruang']."</td>";
				echo "<td>".$display['rak']."</td>";
				echo "<td>".$display['baris']."</td>";
				echo "<td>".$display['box']."</td>";
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
break;

case "arsipInAktif":
?>
<!-- view Laporan Arsip In Aktif -->
<div id="content">

	<div class="container">
		<div id="legend">
		  <legend class="">Laporan Status Arsip In Aktif</legend>
		</div>

		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
		<thead>
			<tr>
				<th rowspan="2"><center>Jenis Arsip</center></th>
				<th rowspan="2"><center>Nama Arsip</center></th>
				<th rowspan="2"><center>Tanggal Arsip</center></th>
				<th rowspan="2"><center>Retensi Arsip (th)</center></th>
				<th rowspan="2"><center>Umur Arsip (th)</center></th>				
				<th colspan="4"><center>Lokasi</center></th>
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
		if($all_inaktif!=0){
			foreach($all_inaktif as $display){	
				echo "<tr>";
				echo "<td>".$display['nama_jenisarsip']."</a></td>";  
				echo "<td>".$display['nama_arsip']."</td>";
				echo "<td>".$display['tgl']."</td>";
				echo "<td>".$display['masa_retensi']."</td>";
				echo "<td>".$display['diff_years']."</td>";
				echo "<td>".$display['nama_ruang']."</td>";
				echo "<td>".$display['rak']."</td>";
				echo "<td>".$display['baris']."</td>";
				echo "<td>".$display['box']."</td>";
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
break;

case "arsipMusnah":
?>
<!-- view Laporan Status Musnah -->
<div id="content">

	<div class="container">
		<div id="legend">
		  <legend class="">Laporan Status Arsip Musnah</legend>
		</div>

		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
		<thead>
			<tr>
				<th rowspan="2"><center>Jenis Arsip</center></th>
				<th rowspan="2"><center>Nama Arsip</center></th>
				<th rowspan="2"><center>Tanggal Arsip</center></th>
				<th rowspan="2"><center>Retensi Arsip (th)</center></th>
				<th rowspan="2"><center>Umur Arsip (th)</center></th>				
				<th colspan="4"><center>Lokasi</center></th>
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
		if($all_musnah!=0){
			foreach($all_musnah as $display){	
				echo "<tr>";
				echo "<td>".$display['nama_jenisarsip']."</a></td>";  
				echo "<td>".$display['nama_arsip']."</td>";
				echo "<td>".$display['tgl']."</td>";
				echo "<td>".$display['masa_retensi']."</td>";
				echo "<td>".$display['diff_years']."</td>";
				echo "<td>".$display['nama_ruang']."</td>";
				echo "<td>".$display['rak']."</td>";
				echo "<td>".$display['baris']."</td>";
				echo "<td>".$display['box']."</td>";
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