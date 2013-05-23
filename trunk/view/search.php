<?php
/**
 * @author freaksmj
 */
include ("topbar.php");
include_once ('../controller/jenisarsipController.php');
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Pencarian</title>
   <!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="../includes/css/bootstrap.css">
	<link rel="stylesheet" href="../includes/css/application.css">
	
	<script type="text/javascript" src="../includes/js/bootstrap.js"></script>
	<script type="text/javascript" src="../includes/js/jquery.js"></script>
	<script type="text/javascript" src="../includes/js/bootstrap-dropdown.js"></script>
  
	<link type="text/css" rel="stylesheet" href="../includes/DT/css/DT_bootstrap.css">
	<script type="text/javascript" charset="utf-8" language="javascript" src="../includes/DT/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="../includes/DT/js/DT_bootstrap.js"></script>
 
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
						<li><a href="arsip.php">Daftar Arsip</a></li>
						<li><a href="arsip.php?modul=tambah">Rekam Arsip</a></li>
					</ul>    				
				</li>
				
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-briefcase icon-white"></i>
						<span>Peminjaman Arsip</span> 
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">							
						<li><a href="pinjam.php">Daftar Peminjaman Arsip</a></li>
						<li><a href="pinjam.php?modul=tambah">Pinjam</a></li>
					</ul>    				
				</li>
				
				<li class="dropdown active">					
					<a href="search.php" >
						<i class="icon-search"></i>
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
						<li><a href="#">Peminjaman Arsip</a></li>
						<li class="dropdown-submenu">
							<a tabindex="-1" href="#">Status Arsip</a>
							<ul class="dropdown-menu">
							<li><a href="./laporanstatusarsip.php">Arsip Aktif</a></li>
							<li><a href="#">Arsip Inaktif</a></li>
							<li><a href="#">Arsip Musnah</a></li>
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
				<h2>Pencarian Arsip</h2>
				<p>Gunakan Menu Pencarian Untuk Mencari Arsip Yang Dibutuhkan Dengan Cepat </p>
			</div> <!-- /.masthead-text -->
			
		</div>
		
	</div> <!-- /.container -->	
	
</div> <!-- /#masthead -->
<br>

<div class="container">
<div class="row">
<?php
include_once ('sidebar_search.php');
$modul=$_GET['modul'];
$id=$_GET['id'];
switch($modul){
    
    default :
?>
<div class="span9">
<div id="content">

	<div class="container">
	<div id="legend">
	  <legend class=""><a href="jenisarsip.php">Daftar Jenis Arsip</a> | <a href="jenisarsip.php?modul=tambah">Rekam Jenis Arsip</a></legend>
	</div>

<?php
	if($all!=0){
?>				
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
	<thead>
		<tr>
			<th>Jenis Arsip</th>
			<th>Retensi(th)</th>
			<th>Uraian</th>
			<th>Perubahan Terakhir</th>
			<th>Ubah</th>
			<th>Hapus</th>
		</tr>
	</thead>
	<tbody>
<?php
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
			echo "<td>
					<a data-toggle='modal' href='#tes'>
					
						<i class=\"icon-remove-sign\"></i>
						<span>Hapus</span>        					
					</a>
				 </td>";
	}
?>
	</tbody>
	<div id="tes" class="modal hide fade in">
            <div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">X</button>
			</div> 
			<div class="modal-body">
			  <center>
              <h4>Anda Yakin Akan Menghapus Jenis Arsip Ini ?</h4></br>
			  <a href="jenisarsip.php?delete=<?php echo $display['jenisarsip_id'];?>" class="btn btn-secondary">Ya</a>              
			  <a href="#" class="btn" data-dismiss="modal">Tidak</a>
			  </center>
            </div>
    </div>
<?php
	}else{
		echo "<div class=\"alert\">
			  <buttontype=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
			  Data Tidak Ada
			  </div>";
	}
?>
</table>
		</div>
		
	</div> <!-- /.container -->

</div> <!-- /#content -->
</div>
</div>
</div>
<?php


break;
}
?>

<?php
include("footer.php");
?>

<script type="text/javascript">

$(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });

</script>