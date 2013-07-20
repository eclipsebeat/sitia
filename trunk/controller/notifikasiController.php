<?php
/**
 * @author freaksmj
 */
 
	include_once('../class/notifikasi.php');
	include_once('../class/pinjam.php');
	
	$pinjam = new Pinjam();	
	
	$notifikasi = new Notifikasi();
	$all_notif=$notifikasi->getAllNotifikasi();
	
	if(isset($_SESSION['login'])&& $_SESSION['level']==1){
		$deadline=$pinjam->getJeda();
		$data_notif=$notifikasi->getJmlnotif();		
	}
	
	if(isset($_GET['read'])){
		$notifikasi = new Notifikasi();
		$id			= $_GET['read'];
		$notif_stat	= '1';
		
		$read=$notifikasi->readNotif($id,$notif_stat);
		if($read==1){
			header("location:notifikasi.php");
		}
	}
	
	/**
	if($data!=0){
		foreach($data as $row){
			$message = "Besok Adalah Tanggal Akhir Pengembalian Arsip : ".$row['nama_arsip']." yang dipinjam oleh ".$row['username']."";
			$notif=$notifikasi->addNotifikasi($message);
		}
	}*/
?>