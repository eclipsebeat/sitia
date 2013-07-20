<?php
/**
 * @author freaksmj
 */
include ("topbar.php");
include_once ('../controller/searchController.php');
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
				
				<li class="dropdown active">					
					<a href="search.php">
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
				<h2>Pencarian Arsip</h2>
				<p>Gunakan Menu Pencarian Untuk Mencari Arsip Yang Dibutuhkan Dengan Cepat </p>
			</div> <!-- /.masthead-text -->
			
		</div>
		
	</div> <!-- /.container -->	
	
</div> <!-- /#masthead -->
<br>

<?php
//include_once ('sidebar_search.php');
$modul=$_GET['modul'];
$id=$_GET['id'];
switch($modul){
    
    default :
?>

<div class="row">
	<div id="search" class="span3 well">
		<!-- simple search -->
		<form name="simpleSearch" action="#" method="post">
			<fieldset>
			<legend>Pencarian Sederhana</legend>
			<div class="control-group">
				<!-- Keyword -->
				<label class="control-label"  for="keyword"></label>
				<div class="controls">
					<input type="text" id="keyword" name="keyword" placeholder="Masukkan Kata Pencarian">
				</div>
			</div>
			<button class="btn-info btn" type="submit" name="search">Pencarian</button>		
			</fieldset>
		</form>
		<!-- simple search -->	
		<!-- advance search -->
		<form name="advanceSearch" action="#" method="post">
			<fieldset>
			<legend>Pencarian Spesifik</legend>
			<div class="control-group">
				<!-- Nama Arsip -->
				<label class="control-label"  for="nama">Nama Arsip</label>
				<div class="controls">
					<input type="text" id="nama" name="nama" placeholder="Nama Arsip">
				</div>
			</div>	
			<div class="control-group">
				<!-- Jenis Arsip -->
				<label class="control-label"  for="jenis">Jenis Arsip</label>
					<div class="controls">
						<select name="jenis">
						<?php
							foreach($all_jenis as $rows_jenis){
								echo "<option value=\"".$rows_jenis['jenisarsip_id']."\">".$rows_jenis['nama_jenisarsip']."</option>";							
							}
						?>
						</select>
					</div>
			</div>
			<div class="control-group">
				<!-- Ruang Arsip -->
				<label class="control-label"  for="ruang">Ruang Arsip</label>
				<div class="controls">
					<select name="ruang">
					<?php
						foreach($all_ruang as $rows_ruang){
							echo "<option value=\"".$rows_ruang['ruang_id']."\">".$rows_ruang['nama_ruang']."</option>";							
						}
					?>
					</select>
				</div>
			</div>			
			<button class="btn-info btn" type="submit" name="advancesearch">Pencarian</button>
			</fieldset>
		</form>
		<!-- advance search -->
	</div>
	
	<div id="content" class="span8">

		<?php
		if(isset($error_search)){
			echo '<legend>Hasil Pencarian</legend>';
			echo '<div class="alert alert-error" id="alert">'.$error_search.' 
				<button type="button" class="close" data-dismiss="alert" id="close">×</button></div>';
		}elseif(isset($data_cari)){
		?>
		<legend>Hasil Pencarian</legend>
		<table cellpadding="0" cellspacing="0" border="0" class="table" >
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
			foreach($data_cari as $display){		
				echo "<tr>";
				echo "<td>".$display['nama_arsip']."</a></td>";//namaarsip //lom bs link k detail tiap jenis arsip  
				echo "<td>".$display['nama_ruang']."</td>";//ruang
				echo "<td>".$display['rak']."</td>";//rak
				echo "<td>".$display['baris']."</td>";//baris
				echo "<td>".$display['box']."</td>";//box
					if($display['jenisarsip_id']==1){
						echo"<td>
							<a href=\"suratmasuk.php?modul=detail&id=".$display['arsip_id']."\">
								<i class=\"icon-edit\"></i>
								<span>Detail</span>       					
							</a>
						  </td>";
					}elseif($display['jenisarsip_id']==2){
						echo"<td>
							<a href=\"suratkeluar.php?modul=detail&id=".$display['arsip_id']."\">
								<i class=\"icon-edit\"></i>
								<span>Detail</span>       					
							</a>
						  </td>";
					}elseif($display['jenisarsip_id']==3){
						echo"<td>
							<a href=\"sp2d.php?modul=detail&id=".$display['arsip_id']."\">
								<i class=\"icon-edit\"></i>
								<span>Detail</span>       					
							</a>
						  </td>";
					}elseif($display['jenisarsip_id']==4){
						echo"<td>
							<a href=\"spj_bendum.php?modul=detail&id=".$display['arsip_id']."\">
								<i class=\"icon-edit\"></i>
								<span>Detail</span>       					
							</a>
						  </td>";
					}else{
						echo"<td>
							<a href=\"lkpp.php?modul=detail&id=".$display['arsip_id']."\">
								<i class=\"icon-edit\"></i>
								<span>Detail</span>       					
							</a>
						  </td>";
					}

			}
		}elseif(isset($data_cari2)){
		?>
		<legend>Hasil Pencarian</legend>
		<table cellpadding="0" cellspacing="0" border="0" class="table" >
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
			foreach($data_cari2 as $display){		
				echo "<tr>";
				echo "<td>".$display['nama_arsip']."</a></td>";//namaarsip //lom bs link k detail tiap jenis arsip  
				echo "<td>".$display['nama_ruang']."</td>";//ruang
				echo "<td>".$display['rak']."</td>";//rak
				echo "<td>".$display['baris']."</td>";//baris
				echo "<td>".$display['box']."</td>";//box
					if($display['jenisarsip_id']==1){
						echo"<td>
							<a href=\"suratmasuk.php?modul=detail&id=".$display['arsip_id']."\">
								<i class=\"icon-edit\"></i>
								<span>Detail</span>       					
							</a>
						  </td>";
					}elseif($display['jenisarsip_id']==2){
						echo"<td>
							<a href=\"suratkeluar.php?modul=detail&id=".$display['arsip_id']."\">
								<i class=\"icon-edit\"></i>
								<span>Detail</span>       					
							</a>
						  </td>";
					}elseif($display['jenisarsip_id']==3){
						echo"<td>
							<a href=\"sp2d.php?modul=detail&id=".$display['arsip_id']."\">
								<i class=\"icon-edit\"></i>
								<span>Detail</span>       					
							</a>
						  </td>";
					}elseif($display['jenisarsip_id']==4){
						echo"<td>
							<a href=\"spj_bendum.php?modul=detail&id=".$display['arsip_id']."\">
								<i class=\"icon-edit\"></i>
								<span>Detail</span>       					
							</a>
						  </td>";
					}else{
						echo"<td>
							<a href=\"lkpp.php?modul=detail&id=".$display['arsip_id']."\">
								<i class=\"icon-edit\"></i>
								<span>Detail</span>       					
							</a>
						  </td>";
					}

			}
		}else{
		?>
		<legend>10 Arsip Terakhir</legend>
		<table cellpadding="0" cellspacing="0" border="0" class="table" >
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
			foreach($data as $display){		
				echo "<tr>";
				echo "<td>".$display['nama_arsip']."</a></td>";//namaarsip //lom bs link k detail tiap jenis arsip  
				echo "<td>".$display['nama_ruang']."</td>";//ruang
				echo "<td>".$display['rak']."</td>";//rak
				echo "<td>".$display['baris']."</td>";//baris
				echo "<td>".$display['box']."</td>";//box
					if($display['jenisarsip_id']==1){
						echo"<td>
							<a href=\"suratmasuk.php?modul=detail&id=".$display['arsip_id']."\">
								<i class=\"icon-edit\"></i>
								<span>Detail</span>       					
							</a>
						  </td>";
					}elseif($display['jenisarsip_id']==2){
						echo"<td>
							<a href=\"suratkeluar.php?modul=detail&id=".$display['arsip_id']."\">
								<i class=\"icon-edit\"></i>
								<span>Detail</span>       					
							</a>
						  </td>";
					}elseif($display['jenisarsip_id']==3){
						echo"<td>
							<a href=\"sp2d.php?modul=detail&id=".$display['arsip_id']."\">
								<i class=\"icon-edit\"></i>
								<span>Detail</span>       					
							</a>
						  </td>";
					}elseif($display['jenisarsip_id']==4){
						echo"<td>
							<a href=\"spj_bendum.php?modul=detail&id=".$display['arsip_id']."\">
								<i class=\"icon-edit\"></i>
								<span>Detail</span>       					
							</a>
						  </td>";
					}else{
						echo"<td>
							<a href=\"lkpp.php?modul=detail&id=".$display['arsip_id']."\">
								<i class=\"icon-edit\"></i>
								<span>Detail</span>       					
							</a>
						  </td>";
					}

			}

		}

		?>
		</tbody>
		</table>
	</div> <!-- /#content -->
</div>
<?php
}
include("footer.php");
?>

<script type="text/javascript">

$(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });

</script>