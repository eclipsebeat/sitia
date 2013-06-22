<?php
/**
 * @author freaksmj
 */
 
	include_once('../class/pinjam.php');
	include_once('../class/status.php');
	
	//laporan peminjaman
	$pinjam = new Pinjam();
	$all_pinjam=$pinjam->getAllPinjam();
	
	//laporan Arsip Aktif
	$aktif	= new Status();
	$all_aktif=$aktif->getArsipaktif();
	
	//laporan Arsip Inaktif
	$inaktif = new Status();
	$all_inaktif=$inaktif->getArsipinaktif();
	
	//laporan Status Arsip Musnah
	$musnah = new Status();
	$all_musnah=$musnah->getStatusmusnah();
	
?>