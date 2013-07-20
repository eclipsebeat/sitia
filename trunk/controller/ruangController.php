<?php
/**
 * @author freaksmj
 */
 
include_once('../class/ruang.php');
	
	$ruang = new Ruang();
	$all=$ruang->getAllruang();
	
	if(isset($_POST['rekam_ruang'])){
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

		$ruang = new Ruang();
		$id=$_GET['id'];
		
		$ubah=$ruang->getRuangdetail($id);
	}	
	
	if(isset($_POST['update_ruang'])){

		$ruang	= new Ruang();
		$id			=$_POST['id_ubah'];
		$koderuang	=$_POST['koderuang'];
		$namaruang	=$_POST['namaruang'];
		
		if(empty($koderuang)||empty($namaruang)){
			$error_rekam="Semua Field Harus diisi!";
		}
		else {
			$rekam=$ruang->updateRuang($id,$koderuang,$namaruang);
			if($rekam == 1){
				$success="Data Ruang Berhasil Di Ubah";
				header ("refresh: 3; ruang.php");
			}else{
				$error="Ruang Sudah Terdapat Pada Database";
			}
		}
		
	}	
	
	if (isset($_GET['delete'])){

		$ruang = new Ruang();
		$id=$_GET['delete'];
		
		$hapus=$ruang->deleteRuang($id);
		if($hapus=1){
			$success="Ruang berhasil di hapus";
			header ('refresh: ruang.php');
		}else{
			$error_delete="Ruang gagal di hapus";
		}
	}
?>