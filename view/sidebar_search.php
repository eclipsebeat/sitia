<?php
/**
 * @author freaksmj
 */
 
 include_once ('../controller/searchController.php');
?>
<!DOCTYPE html>
<html>
 <head>
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="../includes/css/bootstrap.css">
	<link rel="stylesheet" href="../includes/css/application.css">
 </head>
 <body>
	<div id="search" class="span3 sidebar">
	<!-- simple search -->
        <div class="well">
			<form name="simpleSearch" action="#" method="post">
			<fieldset>
				<div id="legend">
				<legend class="">Pencarian Sederhana</legend>
				</div>
					<div class="control-group">
							  <!-- Nama Arsip -->
							  <label class="control-label"  for="nama"></label>
							  <div class="controls">
								<input type="text" id="keyword" name="keyword" placeholder="Masukkan Kata Pencarian">
							  </div>
					</div>
					<button class="btn-info btn" type="submit" name="search">Pencarian</button>		
			</fieldset>
			</form>
	<!-- simple search -->	
		<hr>
	<!-- advance search -->
        <form name="advanceSearch" action="#" method="post">
			<fieldset>
				<div id="legend">
				<legend class="">Pencarian Spesifik</legend>
				</div>
					<div class="control-group">
							  <!-- Nama Arsip -->
							  <label class="control-label"  for="nama">Nama Arsip</label>
							  <div class="controls">
								<input type="text" id="username" name="username" placeholder="Nama Arsip">
							  </div>
					</div>	
					<div class="control-group">
							  <!-- Jenis Arsip -->
							  <label class="control-label"  for="jenis">Jenis Arsip</label>
							  <div class="controls">
								<select name="role">
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
	</div>
 </body>
</html>