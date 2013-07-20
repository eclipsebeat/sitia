<?php
/**
 * @author freaksmj
 */
 
	include_once('../class/arsip.php');
	include_once('../class/ruang.php');
	include_once('../class/seksi.php');	
	include_once('../class/suratkeluar.php');
	include_once('../class/autokeyword.php');
	
	//dropdown ruang
	$ruang = new Ruang();
	$all_ruang=$ruang->getAllruang();

	//dropdown seksi
	$seksi = new Seksi();
	$all_seksi=$seksi->getAllseksi();
	
	//view all arsip
	$arsip = new Arsip();
	$jenis=2;
	$all=$arsip->getAllarsip($jenis);
	
	//rekam arsip surat keluar
	if(isset($_POST['rekam_sk'])){

		//input arsip
		$arsip			= new Arsip();
		$jenis_arsip	=2;
		$nama			=$_POST['nama'];
		$ruang			=$_POST['ruang'];
		$rak			=$_POST['rak'];
		$baris			=$_POST['baris'];
		$box			=$_POST['box'];
		
		$sk 		= new Suratkeluar();
		$nosurat	=$_POST['nosurat'];
		$tanggal	=$_POST['tanggal'];
		$perihal	=$_POST['perihal'];
		$kepada		=$_POST['kepada'];
		$penerbit	=$_POST['penerbit'];
		$uraian		=$_POST['uraian'];
		
		//attachment
		$FileName	= $_FILES['upload']['name'];
		$TempName	= $_FILES['upload']['tmp_name'];
		$ext		=  pathinfo($FileName, PATHINFO_EXTENSION);
		
		if(empty($ruang)||empty($rak)||empty($baris)||empty($box)||empty($nosurat)||empty($tanggal)||empty($perihal)||empty($kepada)||empty($penerbit)||empty($uraian)){
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
				$cek=$sk->getNo($nosurat);
				if($cek==0){
				//autokeyword
				$autokeyword = new Autokeyword();
				$stopwords = file('../includes/stopwords/stopword_list_tala.txt');
				$data = $nama.$perihal.$kepada.$uraian;
				$keywords = $autokeyword->getKeywords($data,$stopwords);
				
				//rename attachment
				$date=date("dmYHis");
				$new_file_name=$date.$FileName;
				$path="../attachment/surat/keluar/".$new_file_name;
				//upload
				move_uploaded_file ($_FILES['upload']['tmp_name'],$path);
				
				//rekam arsip
				$rekam	=$sk->addArsipSk($jenis_arsip,$nama,$ruang,$rak,$baris,$box,$keywords,$arsip_id,$nosurat,$tanggal,$perihal,$kepada,$penerbit,$uraian,$new_file_name);
					if($rekam ==1){
						$success="Arsip Berhasil Direkam";
						header("refresh:3;suratkeluar.php");
					}
				}else{
					$error_rekam="Surat Sudah Terdapat Pada Database";
				}	
		}
	}
	
	//get id =>tampil
	if(isset($_GET['id'])){
		$sk = new Suratkeluar();
		$id	=$_GET['id'];
		
		$ubah=$sk->getSk($id);
	}
	
	//update arsip surat keluar
	if(isset($_POST['update_sk'])){

		//input arsip
		$arsip			= new Arsip();
		$jenis_arsip	=2;
		$id				=$_POST['id_ubah'];
		$nama			=$_POST['nama'];
		$ruang			=$_POST['ruang'];
		$rak			=$_POST['rak'];
		$baris			=$_POST['baris'];
		$box			=$_POST['box'];
		
		$sk 		= new Suratkeluar();
		$nosurat	=$_POST['nosurat'];
		$tanggal	=$_POST['tanggal'];
		$perihal	=$_POST['perihal'];
		$kepada		=$_POST['kepada'];
		$penerbit	=$_POST['penerbit'];
		$uraian		=$_POST['uraian'];
		
		//attachment
		$FileName	= $_FILES['upload']['name'];
		$TempName	= $_FILES['upload']['tmp_name'];
		$ext		=  pathinfo($FileName, PATHINFO_EXTENSION);
		
		if(empty($ruang)||empty($rak)||empty($baris)||empty($box)||empty($nosurat)||empty($tanggal)||empty($perihal)||empty($kepada)||empty($penerbit)||empty($uraian)){
			$error_rekam="Semua Field Harus diisi!";
		}
		//attachment ad atau gak
		elseif(empty($FileName)){
			//$error_rekam="File Tidak Ditemukan!";
			$new_file_name=$_POST['attachment'];
			
			//autokeyword
			$autokeyword = new Autokeyword();
			$stopwords = file('../includes/stopwords/stopword_list_tala.txt');
			$data = $nama.$perihal.$kepada.$uraian;
			$keywords = $autokeyword->getKeywords($data,$stopwords);
				
			//rekam arsip
			$rekam	=$sk->updateSk($id,$nama,$ruang,$rak,$baris,$box,$keywords,$nosurat,$tanggal,$perihal,$kepada,$penerbit,$uraian,$new_file_name);
				if($rekam ==1){
					$success="Arsip Berhasil Di Update";
					header("refresh:3;suratkeluar.php");
				}else{
					$error_rekam="Arsip Tidak Berhasil Di Ubah";
				}			
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

				//autokeyword
				$autokeyword = new Autokeyword();
				$stopwords = file('../includes/stopwords/stopword_list_tala.txt');
				$data = $nama.$perihal.$kepada.$uraian;
				$keywords = $autokeyword->getKeywords($data,$stopwords);
				
				//rename attachment
				$date=date("dmYHis");
				$new_file_name=$date.$FileName;
				$path="../attachment/surat/keluar/".$new_file_name;
				//upload
				move_uploaded_file ($_FILES['upload']['tmp_name'],$path);
				
				//rekam arsip
				$rekam	=$sk->updateSk($id,$nama,$ruang,$rak,$baris,$box,$keywords,$nosurat,$tanggal,$perihal,$kepada,$penerbit,$uraian,$new_file_name);
					if($rekam ==1){
						$success="Arsip Berhasil Di Update";
						header("refresh:3;suratkeluar.php");

					}else{
						$error_rekam="Arsip Tidak Berhasil Di Ubah";
					}	
		}
	}
	
	if (isset($_GET['delete'])){

		$sk = new Suratkeluar();
		$id	=$_GET['delete'];
		session_start();
		
		$hapus=$sk->deleteSk($id);
		if($hapus=1){
			$success="Arsip Surat Keluar Berhasil di Hapus";
			header ("refresh:3;suratkeluar.php");
		}else{
			$error_delete="Arsip Surat keluar Gagal di hapus";
		}
	}	

?>