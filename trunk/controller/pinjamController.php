<?php
/**
 * @author freaksmj
 */
 
	include_once('../class/arsip.php');
	include_once('../class/pinjam.php');
	
	//tambah
	include_once('../class/notifikasi.php');
	$notif = new Notifikasi();
	
	//view all available arsip
	$arsip = new Arsip();
	$all=$arsip->getTersedia();
	
	//view arsip yg d pinjam oleh user (kembali)
	$users=$_SESSION['login'];
	$pinjam = new Pinjam();
	$view_pinjam=$pinjam->getPinjam($users);
	
	//view laporan peminjaman
	$pinjam = new Pinjam();	
	$history_pinjam=$pinjam->getAllPinjam();
	
	
	if(isset($_GET['id'])){
		$pinjam = new Pinjam();
		$id	=$_GET['id'];
		
		$ubah=$pinjam->getArsippinjam($id);
	}
	
	if(isset($_POST['rekam_pinjam'])){
	
		$pinjam		= new Pinjam();
		$arsip_id	=$_POST['id_ubah'];
		$user_id	=$_POST['id_user'];

		$username	=$_POST['username'];
		$nama_arsip =$_POST['nama'];
		$tgl_akhir	=$_POST['tgl_akhir'];
		$uraian		=$_POST['uraian'];
		
		$arsip			= new Arsip();
		$id				=$_POST['id_ubah'];
		$stat_pinjam	='Y';
		
		$message = "Besok Adalah Tanggal Akhir Pengembalian Arsip : ".$nama_arsip." yang dipinjam oleh ".$username."";
		
		if(empty($uraian)){
			$error_rekam="Semua Field Harus diisi!";		
		}else{
			$rekam=$pinjam->pinjam($id,$arsip_id,$user_id,$tgl_akhir,$uraian,$stat_pinjam,$message);
				if($rekam ==1){
					$success="Pinjam Arsip Berhasil Direkam";
					header("refresh:3;pinjam.php");

				}else{
					$error_rekam="Pinjam Arsip Tidak Berhasil Di Ubah";
				}				
		}
	
	}
	
	if(isset($_GET['kembali']) && isset($_GET['id'])){
		$pinjam		= new Pinjam();
		$id			= $_GET['id'];
		$pinjam_id	= $_GET['kembali'];
		$stats		= 'N';
		$notif_stat	= '1';
		$kembali=$pinjam->kembali($id,$stats,$pinjam_id,$notif_stat);
		if($kembali==1){
			//$success="Pengembalian Arsip Berhasil";
			header("refresh:3;pinjam.php?modul=kembali");
		}else{
			$error_kembali="Pengembalian Arsip Gagal";
		}
	}
		

?>