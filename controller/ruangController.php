<?php
/**
 * @author freaksmj
 */
 
	include_once('../class/ruang.php');
	$ruang = new Ruang();
	$all=$ruang->getAllruang();
	
	if(isset($_POST['rekam_ruang'])){
		//include_once('class/ruang.php');
		$ruang	= new Ruang();
		$koderuang	=$_POST['koderuang'];
		$namaruang	=$_POST['namaruang'];
		
		if(empty($koderuang)||empty($namaruang)){
			$error_rekam="Semua Field Harus diisi!";
		}else {
			$cek=$ruang->getRuang($koderuang);
			if($cek==0){
				$rekam=$ruang->addRuang($koderuang,$namaruang);
				if($rekam ==1){
					$success="Ruang Baru Berhasil Direkam";
					header ('refresh: 3; ruang.php');
				}
			}else{
				$error_rekam="Ruang Sudah Terdapat Pada Database";

			}
		}
		
	}
	
	if (isset($_GET['id'])){
		//include_once('class/ruang.php');
		$ruang = new Ruang();
		$id=$_GET['id'];
		session_start();
		
		$ubah=$ruang->getRuangdetail($id);
	}	
	
	if(isset($_POST['update_ruang'])){
		//include_once('class/ruang.php');
		$ruang	= new Ruang();
		$id			=$_POST['id_ubah'];
		$koderuang	=$_POST['koderuang'];
		$namaruang	=$_POST['namaruang'];
		
		if(empty($koderuang)||empty($namaruang)){
			$error_rekam="Semua Field Harus diisi!";
		}
		else {
			//$cek=$ruang->getRuang($koderuang);
			//if($cek==0){
				$rekam=$ruang->updateRuang($id,$koderuang,$namaruang);
				if($rekam == 1){
					$success="Data Ruang Berhasil Di Ubah";
					header ("refresh: 3; ruang.php");
				//}
			}else{
				$error="Ruang Sudah Terdapat Pada Database";
			}
		}
		
	}	
	
	if (isset($_GET['delete'])){
		//include_once('class/ruang.php');
		$ruang = new Ruang();
		$id=$_GET['delete'];
		session_start();
		
		$hapus=$ruang->deleteRuang($id);
		if($hapus=1){
			$success="Ruang berhasil di hapus";
			header ('refresh: ruang.php');
		}else{
			$error_delete="Ruang gagal di hapus";
		}
	}
?>