<?php
/**
 * @author freaksmj
 */
include_once ('topbar.php');
include_once ('../controller/utilityController.php');
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Admin Area - RUH USER</title>
   <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="../includes/css/bootstrap.css">
	<link rel="stylesheet" href="../includes/css/application.css">
	<link rel="stylesheet" href="../includes/datepicker/css/datepicker.css">
		
	<script type="text/javascript" src="../includes/js/bootstrap.js"></script>
	<script type="text/javascript" src="../includes/js/jquery.js"></script>
	<script type="text/javascript" src="../includes/js/bootstrap-dropdown.js"></script>
	<script type="text/javascript" src="../includes/js/bootstrap-modal.js"></script>
	<script type="text/javascript" src="../includes/datepicker/js/bootstrap-datepicker.js"></script>
  
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
				<h2>RUH User</h2>
				<p>Menu untuk melakukan manajemen User. Pada menu ini Admin dapat merekam, merubah dan menghapus User.</p>
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
	  <legend class=""><a href="user.php">Daftar User</a> | <a href="user.php?modul=tambah">Rekam User</a></legend>
	</div>
	
	<div class="well">
		<form method="post" enctype="multipart/form-data" action="#" accept-charset="UTF-8">
<?php
	if(isset($error)){
		echo '<div class="alert alert-error" id "alert">'.$error.'
			  <button type="button" class="close" data-dismiss="alert" id="close">x</button>
			  </div>';
	}
	if(isset($success)){
		echo '<div class="alert alert-success">'.$success.'
			  <button type="button" class="close" data-dismiss="alert" id="close">x</button>
			  </div>';
	}
?> 
		<div class="well">
			<button class="btn-info btn" type="submit" name="backup">Backup Database</button>
		</div>
		
		<div class="control-group">
			<!-- Attachment -->			
				<label class="control-label" for="file">Nama File</label>
				<div class="controls">
					<!--<input type="hidden" name="MAX_FILE_SIZE" value="120000">-->
					<input type="file" name="datafile" id="file" placeholder="Pilih File" class="span3">
				</div>
		</div>		
		<div class="control-group">
				<!-- Button -->
				<div class="controls">
				<button class="btn-info btn" type="submit" name="restore">Load</button>
				</div>
		</div>
		</form>
    </div>
	</div>
	</div>
<?php
break;

case "view_sp2d":
?>
<?php
	if($data_sp2d!=0){
?>				
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
	<thead>
		<tr>
			<th>No SP2D</th>
			<th>Tanggal</th>
			<th>Satker</th>
			<th>Nilai</th>
			<th>Kepada</th>
			<th>Uraian</th>			
			<th>Ubah</th>
			<th>Hapus</th>
		</tr>
	</thead>
	<tbody>
<?php
	foreach($data_sp2d as $display){
			echo "<tr>";
			//echo "<td><input type='text' style='width:70px;padding:1px' value=".$display['nosp2d']." </td>";
			echo "<td>".$display['nosp2d']."</td>";
			echo "<td>".$display['tgsp2d']."</td>";
			echo "<td>".$display['kdsatker']."</td>";
			echo "<td>".$display['nilaisp2d']."</td>";
			echo "<td>".$display['uraiben']."</td>";
			echo "<td>".$display['untuk']."</td>";		
			echo "<td>
					<a href=\"tes.php?modul=ubah&id=".$display['nosp2d']."\">
						<i class=\"icon-edit\"></i>
						<span>Ubah</span>        					
					</a>
				  </td>";
			//warning biasa  
			echo "<td>
					<a href=\"user.php?delete=".$display['user_id']."\" data-confirm='Anda Yakin Akan menghapus User : ".$display['username']." ?'>
						<i class=\"icon-remove-sign\"></i>
						<span>Hapus</span>        					
					</a>
				  </td>";
			echo "</tr>";

	}
?>
	</tbody>

<?php
	}else{
		echo "<div class=\"alert\">Data Tidak Ada
			  <buttontype=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
			  </div>";
	}
?>
</table>

	</div> <!-- /.container -->

</div> <!-- /#content -->

<?php
break;

case "view_sp2d":
?>
<div id="content">

	<div class="container">
	<div id="legend">
	  <legend class=""><a href="user.php">Daftar User</a> | <a href="user.php?modul=tambah">Rekam User</a></legend>
	</div>
	
	<div class="well">
		<form method="post" action="#" accept-charset="UTF-8">
		<!--<div class="input-append date" id="dp3" data-date="<?php $date=date("Y-m-d");echo $date?>" data-date-format="yyyy-mm-dd">
			<input class="span2" type="text" name="date" value="<?php $date=date("Y-m-d");echo $date?>" readonly>
			<span class="add-on"><i class="icon-calendar"></i></span>
		</div>-->
		<button class="btn-info btn" type="submit" name="load_sp2d">Load</button>
		</form>
    </div>
<?php
	if($data_sp2d!=0){
?>				
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
	<thead>
		<tr>
			<th>No SP2D</th>
			<th>Tanggal</th>
			<th>Satker</th>
			<th>Nilai</th>
			<th>Uraian</th>			
			<th>Ubah</th>
			<th>Hapus</th>
		</tr>
	</thead>
	<tbody>
<?php
	foreach($data_sp2d as $display){
			echo "<tr>";
			echo "<td>".$display['nosp2d']."</td>";
			echo "<td>".$display['tgsp2d']."</td>";
			echo "<td>".$display['kdsatker']."</td>";
			echo "<td>".$display['role']."</td>";
			echo "<td>".$display['last_update']."</td>";			
			echo "<td>
					<a href=\"user.php?modul=ubah&id=".$display['user_id']."\">
						<i class=\"icon-edit\"></i>
						<span>Ubah</span>        					
					</a>
				  </td>";
			//warning biasa  
			echo "<td>
					<a href=\"user.php?delete=".$display['user_id']."\" data-confirm='Anda Yakin Akan menghapus User : ".$display['username']." ?'>
						<i class=\"icon-remove-sign\"></i>
						<span>Hapus</span>        					
					</a>
				  </td>";
				  

	}
?>
	</tbody>

<?php
	}else{
		echo "<div class=\"alert\">Data Tidak Ada
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
				  <legend class="">Rekam User</legend>
				</div>
<?php

	if(isset($error_daftar)){
		echo '<div class="alert alert-error" id="alert">'.$error_daftar.'
			  <button type="button" class="close" data-dismiss="alert" id="close">x</button>
			  </div>';
	}
	if(isset($success)){
		echo '<div class="alert alert-success">'.$success.'
			  <button type="button" class="close" data-dismiss="alert" id="close">x</button>
			  </div>';
	}else{
?>				
				<div class="control-group">
				  <!-- Username -->
				  <label class="control-label"  for="username">Username</label>
				  <div class="controls">
					<input type="text" id="username" name="username" placeholder="Username" class="input-xlarge">
					<p class="help-block">Username can contain any letters or numbers, without spaces</p>
				  </div>
				</div>
				<div class="control-group">
				  <!-- Password-->
				  <label class="control-label" for="password">Password</label>
				  <div class="controls">
					<input type="password" id="password" name="password" placeholder="Password" class="input-xlarge">
					<p class="help-block">Password should be at least 7 characters</p>
				  </div>
				</div>
				<div class="control-group">
				  <!-- Password -->
				  <label class="control-label"  for="password_confirm">Password (Confirm)</label>
				  <div class="controls">
					<input type="password" id="password_confirm" name="password2" placeholder="Password" class="input-xlarge">
					<p class="help-block">Please confirm password</p>
				  </div>
				</div>
				<div class="control-group">
				  <!-- NIP -->
				  <label class="control-label"  for="NIP">NIP</label>
				  <div class="controls">
					<input type="number" id="NIP" name="NIP" placeholder="NIP" class="input-xlarge">
					<p class="help-block">NIP lama</p>
				  </div>
				</div>
				<div class="control-group">
				  <!-- Role -->
				  <label class="control-label"  for="role">Level User</label>
				  <div class="controls">
					<select name="role">
						<option value="1">admin</option>
						<option value="2">Staff</option>
					</select>
					<p class="help-block">Pilih Level User</p>
				  </div>
				</div>
				<div class="control-group">
				  <!-- Button -->
				  <div class="controls">
					<button type="submit" class="btn btn-primary" name="daftar" id="daftar_btn">Rekam</button>
					<input type="button" class="btn btn-secondary" id="batal_btn" onclick="window.self.history.back()" value="Batal">				  
				  </div>
				</div>
			  </fieldset>
			</form>

	</div> <!-- /.container -->
</div> <!-- /#content -->

<?php
}
break;
case "ubah":
?>

<div id="content">
	<div class="container">

			<form class="form-horizontal" action="#" method="post">
			  <fieldset>
				<div id="legend">
				  <legend class="">Ubah User</legend>
				</div>
<?php

	if(isset($error_daftar)){
		echo '<div class="alert alert-error" id="alert">'.$error_daftar.'
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
				<input  type="hidden" name="id_ubah" id="id_ubah" value="<?php echo $_GET['id']; ?>" />					 
				<div class="control-group">
				  <!-- Username -->
				  <label class="control-label"  for="username">Username</label>
				  <div class="controls">
					<input type="text" id="username" name="username" placeholder="Username" class="input-xlarge" value="<?php echo $display['username']; ?>">
					<p class="help-block">Username can contain any letters or numbers, without spaces</p>
				  </div>
				</div>
				<div class="control-group">
				  <!-- Password-->
				  <label class="control-label" for="password">Password</label>
				  <div class="controls">
					<input type="password" id="password" name="password" placeholder="Password" class="input-xlarge" value="<?php echo $display['password']; ?>">
					<p class="help-block">Password should be at least 7 characters</p>
				  </div>
				</div>
				<div class="control-group">
				  <!-- Password -->
				  <label class="control-label"  for="password_confirm">Password (Confirm)</label>
				  <div class="controls">
					<input type="password" id="password_confirm" name="password2" placeholder="Password" class="input-xlarge">
					<p class="help-block">Please confirm password</p>
				  </div>
				</div>
				<div class="control-group">
				  <!-- NIP -->
				  <label class="control-label"  for="NIP">NIP</label>
				  <div class="controls">
					<input type="number" id="NIP" name="NIP" placeholder="NIP" class="input-xlarge" value="<?php echo $display['NIP']; ?>">
					<p class="help-block">NIP lama</p>
				  </div>
				</div>
				<div class="control-group">
				  <!-- Role -->
				  <label class="control-label"  for="role">Level User</label>
				  <div class="controls">
					<select name="role">
						<option value="1">admin</option>
						<option value="2">Staff</option>
					</select>
					<p class="help-block">Pilih Level User</p>
				  </div>
				</div>
				<div class="control-group">
				  <!-- Button -->
				  <div class="controls">
					<button type="submit" class="btn btn-primary" name="update" id="update_btn">Simpan</button>
					<input type="button" class="btn btn-secondary" id="batal_btn" onclick="window.self.history.back()" value="Batal">
				  </div>
				</div>
			  </fieldset>
			</form>

	</div> <!-- /.container -->
</div> <!-- /#content -->

<?php
}
}
break;
}
?>

<?php
include("footer.php");
?>

<script type="text/javascript">
$(document).ready(function () {
            $('.dropdown-toggle').dropdown();
			
			$('#dp3').datepicker();
			
			$('.ask-plain').click(function(e) {
					
					e.preventDefault();
					thisHref	= $(this).attr('href');
					
					if(confirm('Anda yakin, akan menghapus user ini?')) {
						window.location = thisHref;
					}
					
				});
				
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
			
					function previewUrl(url,target){
        //use timeout coz mousehover fires several times
        clearTimeout(window.ht);
        window.ht = setTimeout(function(){
            var div = document.getElementById(target);
            div.innerHTML = '<iframe style="width:100%;height:100%;" frameborder="0" src="' + url + '" />';
        },20);      
    }
        });


</script>
 </body>  
</html>