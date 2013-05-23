<?php
/**
 * @author freaksmj
 */
 
	include_once('../class/jenis_arsip.php');
	$jenis = new JenisArsip();
	$all=$jenis->getAllJenisarsip();
	
	if(isset($_POST['rekam_jenisarsip'])){
		//include_once('class/jenis_arsip.php');
		$jenis	= new JenisArsip();
		$nama	=$_POST['nama'];
		$retensi=$_POST['retensi'];
		$uraian	=$_POST['uraian'];
		
		if(empty($nama)||empty($retensi)||empty($uraian)){
			$error_rekam="Semua Field Harus diisi!";
		}
		else {
			$cek=$jenis->getJenisarsip($nama);
			if($cek==0){
				$rekam=$jenis->addJenisArsip($nama,$retensi,$uraian);
				if($rekam ==1){
					$success="Jenis Arsip Berhasil Direkam";
					header("refresh:3;jenisarsip.php");
				}
			}
			else{
				$error_rekam="Jenis Arsip Sudah Terdapat Pada Database";
			}
		}
		
	}
	
	if (isset($_GET['id'])){
		//include_once('class/jenis_arsip.php');
		$jenis = new JenisArsip();
		$id=$_GET['id'];
		session_start();
		
		$ubah=$jenis->getJenisarsipdetail($id);
	}	
	
	if(isset($_POST['update_jenisarsip'])){
		//include_once('class/jenis_arsip.php');
		$jenis	= new JenisArsip();
		$id		=$_POST['id_ubah'];
		$nama	=$_POST['nama'];
		$retensi=$_POST['retensi'];
		$uraian	=$_POST['uraian'];
		
		if(empty($nama)||empty($retensi)||empty($uraian)){
			$error_rekam="Semua Field Harus diisi!";
		}
		else {
			//$cek=$jenis->getJenisarsip($nama);
			//if($cek==0){
				$rekam=$jenis->updateJenisarsip($id,$nama,$retensi,$uraian);
				if($rekam ==1){
					$success="Jenis Arsip Berhasil Di Ubah";
					header("refresh:3;jenisarsip.php");
				//}
			}else{
				$error_rekam="Gagal Mengubah Data Jenis Arsip";
			}
		}
		
	}	
	
	if (isset($_GET['delete'])){
		//include_once('class/jenis_arsip.php');
		$jenis = new JenisArsip();
		$id=$_GET['delete'];
		session_start();
		
		$hapus=$jenis->deleteJenisarsip($id);
		if($hapus=1){
			$success="Jenis Arsip berhasil di hapus";
			header("location:jenisarsip.php");
		}else{
			$error_delete="Jenis Arsip gagal di hapus";
		}
	}
	
?>