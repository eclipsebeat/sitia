<?php
/**
 * @author freaksmj
 */
 
	include_once('../class/arsip.php');
	include_once('../class/ruang.php');
	include_once('../class/lkpp.php');
	
	//dropdown ruang
	$ruang = new Ruang();
	$all_ruang=$ruang->getAllruang();

	//view all arsip
	$arsip = new Arsip();
	$jenis=5;
	$all=$arsip->getAllarsip($jenis);	
	
	//rekam arsip lkpp
	if(isset($_POST['rekam_lkpp'])){

		//input arsip
		$arsip			= new Arsip();
		$jenis_arsip	=5;
		$nama			=$_POST['nama'];
		$ruang			=$_POST['ruang'];
		$rak			=$_POST['rak'];
		$baris			=$_POST['baris'];
		$box			=$_POST['box'];
		//$keyword=;
		
		//input lkpp
		//$lastid		=mysql_insert_id();
		//$arsip_id	=$lastid;
		$lkpp 		= new Lkpp();
		$tanggal	=$_POST['tanggal'];		
		$uraian		=$_POST['uraian'];
		
		//attachment
		$FileName	= $_FILES['upload']['name'];
		$TempName	= $_FILES['upload']['tmp_name'];
		$ext	=  pathinfo($FileName, PATHINFO_EXTENSION);
		
		if(empty($ruang)||empty($rak)||empty($baris)||empty($box)){
			$error_rekam="Semua Field Harus diisi!";
		}
		//attachment ad atau gak
		elseif(empty($FileName)){
			$error_rekam="File Tidak Ditemukan!";
		}
		//attachment ekstensi
		elseif($ext!="pdf"){
			$error_rekam="File yang di upload harus berformat pdf!";
		}
		//max size, gk jln? - ubah niai max d php.ini ==> post_max_size
		/*elseif($_FILES['upload']['size'] > 20000000){
			$error_rekam="Ukuran File Melebihi Ukuran Max (20MB)!";
		}*/
		else {
				$cek=$arsip->getArsip($nama);
				if($cek==0){
				//rename attachment
				$date=date("dmYHis");
				$new_file_name=$date.$FileName;
				$path="../attachment/lkpp/".$new_file_name;
				//upload
				move_uploaded_file ($_FILES['upload']['tmp_name'],$path);
				
				//rekam tabel arsip
				$rekam	=$lkpp->addArsiplkpp($jenis_arsip,$nama,$ruang,$rak,$baris,$box,$keyword,$arsip_id,$tanggal,$uraian,$new_file_name);
				//rekam tabel lkpp_detail
				//$rekam2	=$lkpp->addlkpp($arsip_id,$periode,$uraian,$new_file_name);
				
					if($rekam ==1){
						$success="Arsip Berhasil Direkam";
						header("refresh:3;lkpp.php");
					}
				}else{
					$error_rekam="LKPP Sudah Terdapat Pada Database";
				}		
		}
	}
	
	//get id =>tampil
	if(isset($_GET['id'])){
		$lkpp = new Lkpp();
		$id	=$_GET['id'];
		session_start();
		
		$ubah=$lkpp->getLkpp($id);
	}	

	//update arsip lkpp
	if(isset($_POST['update_lkpp'])){

		//input arsip
		$arsip			= new Arsip();
		$jenis_arsip	=5;
		$id				=$_POST['id_ubah'];
		$nama			=$_POST['nama'];
		$ruang			=$_POST['ruang'];
		$rak			=$_POST['rak'];
		$baris			=$_POST['baris'];
		$box			=$_POST['box'];
		//$keyword=;
		
		//input lkpp
		//$lastid		=mysql_insert_id();
		//$arsip_id	=$lastid;
		$lkpp 		= new Lkpp();
		$tanggal	=$_POST['tanggal'];		
		$uraian		=$_POST['uraian'];
		
		//attachment
		$FileName	= $_FILES['upload']['name'];
		$TempName	= $_FILES['upload']['tmp_name'];
		$ext	=  pathinfo($FileName, PATHINFO_EXTENSION);
		
		if(empty($ruang)||empty($rak)||empty($baris)||empty($box)){
			$error_rekam="Semua Field Harus diisi!";
		}
		//attachment ad atau gak
		elseif(empty($FileName)){
			$error_rekam="File Tidak Ditemukan!";
		}
		//attachment ekstensi
		elseif($ext!="pdf"){
			$error_rekam="File yang di upload harus berformat pdf!";
		}
		//max size, gk jln? - ubah niai max d php.ini ==> post_max_size
		/*elseif($_FILES['upload']['size'] > 20000000){
			$error_rekam="Ukuran File Melebihi Ukuran Max (20MB)!";
		}*/
		else {

				//rename attachment
				$date=date("dmYHis");
				$new_file_name=$date.$FileName;
				$path="../attachment/lkpp/".$new_file_name;
				//upload
				move_uploaded_file ($_FILES['upload']['tmp_name'],$path);
				
				//rekam tabel arsip
				$rekam	=$lkpp->updateLkpp($id,$nama,$ruang,$rak,$baris,$box,$keyword,$arsip_id,$tanggal,$uraian,$new_file_name);
				//rekam tabel lkpp_detail
				//$rekam2	=$lkpp->addlkpp($arsip_id,$periode,$uraian,$new_file_name);
				
					if($rekam ==1){
						$success="Arsip Berhasil Direkam";
						header("refresh:3;lkpp.php");

				}else{
					$error_rekam="LKPP Gagal Di Ubah";
				}		
		}
	}
	
	if (isset($_GET['delete'])){

		$lkpp = new Lkpp();
		$id	=$_GET['delete'];
		session_start();
		
		$hapus=$lkpp->deleteLkpp($id);
		if($hapus=1){
			$success="Arsip LKPP Berhasil di Hapus";
			header ("refresh:3;lkpp.php");
		}else{
			$error_delete="Arsip LKPP  Gagal di hapus";
		}
	}	
?>