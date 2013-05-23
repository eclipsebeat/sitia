<?php
/**
 * @author freaksmj
 */
 
	include_once('../class/arsip.php');
	include_once('../class/ruang.php');
	include_once('../class/spjbendum.php');

	//dropdown ruang
	$ruang = new Ruang();
	$all_ruang=$ruang->getAllruang();

	//view all arsip
	$arsip = new Arsip();
	$jenis=4;
	$all=$arsip->getAllarsip($jenis);

	//rekam arsip spj bendum
	if(isset($_POST['rekam_spj'])){

		//input arsip
		$arsip			= new Arsip();
		$jenis_arsip	=4;
		$nama			=$_POST['nama'];
		$ruang			=$_POST['ruang'];
		$rak			=$_POST['rak'];
		$baris			=$_POST['baris'];
		$box			=$_POST['box'];
		//$keyword=;
		
		//input spj
		$spj 		= new Spjbendum();
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
		//max size, gk jln? - ubah nilai max d php.ini ==> post_max_size
		/*elseif($_FILES['upload']['size'] > 20000000){
			$error_rekam="Ukuran File Melebihi Ukuran Max (20MB)!";
		}*/
		else {
				$cek=$lkpp->getTgl($tanggal);
				if($cek==0){
				//rename attachment
				$date=date("dmYHis");
				$new_file_name=$date.$FileName;
				$path="../attachment/spj/".$new_file_name;
				//upload
				move_uploaded_file ($_FILES['upload']['tmp_name'],$path);
				
				//rekam arsip
				$rekam	=$spj->addArsipSpj($jenis_arsip,$nama,$ruang,$rak,$baris,$box,$keyword,$arsip_id,$tanggal,$uraian,$new_file_name);
				
					if($rekam ==1){
						$success="Arsip Berhasil Direkam";
						header("refresh:3;spj_bendum.php");
					}
				}else{
					$error_rekam="Spj Bendum Sudah Terdapat Pada Database";
				}	
		}
	}
	
	//get id =>tampil
	if(isset($_GET['id'])){
		$spj = new Spjbendum();
		$id	=$_GET['id'];
		session_start();
		
		$ubah=$spj->getSpj($id);
	}
	
	//update arsip spj bendum
	if(isset($_POST['update_spj'])){

		//input arsip
		$arsip			= new Arsip();
		$jenis_arsip	=4;
		$id				=$_POST['id_ubah'];
		$nama			=$_POST['nama'];
		$ruang			=$_POST['ruang'];
		$rak			=$_POST['rak'];
		$baris			=$_POST['baris'];
		$box			=$_POST['box'];
		//$keyword=;
		
		//input spj
		$spj 		= new Spjbendum();
		$tanggal	=$_POST['tanggal'];
		$uraian		=$_POST['uraian'];
		
		//attachment
		$FileName	= $_FILES['upload']['name'];
		$TempName	= $_FILES['upload']['tmp_name'];
		$ext		=  pathinfo($FileName, PATHINFO_EXTENSION);
		
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
		//max size, gk jln? - ubah nilai max d php.ini ==> post_max_size
		/*elseif($_FILES['upload']['size'] > 20000000){
			$error_rekam="Ukuran File Melebihi Ukuran Max (20MB)!";
		}*/
		else {

				//rename attachment
				$date=date("dmYHis");
				$new_file_name=$date.$FileName;
				$path="../attachment/spj/".$new_file_name;
				//upload
				move_uploaded_file ($_FILES['upload']['tmp_name'],$path);
				
				//rekam arsip
				$rekam	=$spj->updateSpj($id,$nama,$ruang,$rak,$baris,$box,$keyword,$arsip_id,$tanggal,$uraian,$new_file_name);
					if($rekam ==1){
						$success="Arsip Berhasil Direkam";
						header("refresh:3;spj_bendum.php");

					}else{
						$error_rekam="Spj Bendum Gagal Di Ubah";
					}	
		}
	}

	if (isset($_GET['delete'])){

		$spj = new Spjbendum();
		$id	=$_GET['delete'];
		session_start();
		
		$hapus=$spj->deleteSpj($id);
		if($hapus=1){
			$success="Arsip SPJ Bendum Berhasil di Hapus";
			header ("refresh:3;spj_bendum.php");
		}else{
			$error_delete="Arsip SPJ Bendum Gagal di hapus";
		}
	}	
?>