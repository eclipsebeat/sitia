<?php
/**
 * @author freaksmj
 */
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
						<option value="1">Surat Masuk</option>
						<option value="2">Surat Keluar</option>
					</select>
				  </div>
		</div>
		<div class="control-group">
				  <!-- Ruang Arsip -->
				  <label class="control-label"  for="ruang">Ruang Arsip</label>
				  <div class="controls">
					<select name="ruang">
						<option value="1">Subbag Umum</option>
						<option value="2">Perbendaharaan</option>
					</select>
				  </div>
		</div>			
		<button class="btn-info btn" type="submit" name="search">Pencarian</button>
        </div>
		</fieldset>
		</form>
	<!-- advance search -->
	</div>
 </body>
</html>