<?php
/**
 * @author freaksmj
 */
 
	include_once('../class/arsip.php');
	include_once('../class/ruang.php');
	include_once('../class/suratmasuk.php');
	include_once('../class/autokeyword.php');
	
	//dropdown ruang
	$ruang = new Ruang();
	$all_ruang=$ruang->getAllruang();

	//edit-view all arsip
	$arsip = new Arsip();
	$jenis=1;
	$all=$arsip->getAllarsip($jenis);
	
	//rekam arsip surat masuk
	if(isset($_POST['rekam_sm'])){

		//input arsip
		$arsip			= new Arsip();
		$jenis_arsip	=1;
		$nama			=$_POST['nama'];
		$ruang			=$_POST['ruang'];
		$rak			=$_POST['rak'];
		$baris			=$_POST['baris'];
		$box			=$_POST['box'];
		
		$sm 		= new Suratmasuk();
		$nosurat	=$_POST['nosurat'];
		$tanggal	=$_POST['tanggal'];
		$perihal	=$_POST['perihal'];
		$pengirim	=$_POST['pengirim'];
		$uraian		=$_POST['uraian'];
		
		//attachment
		$FileName	= $_FILES['upload']['name'];
		$TempName	= $_FILES['upload']['tmp_name'];
		$ext	=  pathinfo($FileName, PATHINFO_EXTENSION);
		
		if(empty($ruang)||empty($rak)||empty($baris)||empty($box)||empty($nosurat)||empty($tanggal)||empty($perihal)||empty($pengirim)||empty($uraian)){
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
				$cek=$sm->getNo($nosurat);
				if($cek==0){
				
				//autokeyword
				$autokeyword = new Autokeyword();
				$stopwords = file('../includes/stopwords/stopword_list_tala.txt');
				$data = $nama.$perihal.$pengirim.$uraian;
				$keywords = $autokeyword->getKeywords($data,$stopwords);
				//var_dump($keywords);

				//rename attachment
				$date=date("dmYHis");
				$new_file_name=$date.$FileName;
				$path="../attachment/surat/masuk/".$new_file_name;
				//upload
				move_uploaded_file ($_FILES['upload']['tmp_name'],$path);
				
				//rekam arsip
				$rekam	=$sm->addArsipSm($jenis_arsip,$nama,$ruang,$rak,$baris,$box,$keywords,$arsip_id,$nosurat,$tanggal,$perihal,$pengirim,$uraian,$new_file_name);
				
					if($rekam ==1){
						$success="Arsip Berhasil Direkam";
						header("refresh:3;suratmasuk.php");
					}
				}else{
					$error_rekam="Surat Sudah Terdapat Pada Database";
				}	
		}
	}
	
	//get id =>tampil
	if(isset($_GET['id'])){
		$sm = new Suratmasuk();
		$id	=$_GET['id'];
		
		$ubah=$sm->getSm($id);
	}
	
	//update arsip surat masuk
	if(isset($_POST['update_sm'])){

		//input arsip
		$arsip			= new Arsip();
		$jenis_arsip	=1;
		$id				=$_POST['id_ubah'];
		$nama			=$_POST['nama'];
		$ruang			=$_POST['ruang'];
		$rak			=$_POST['rak'];
		$baris			=$_POST['baris'];
		$box			=$_POST['box'];
		
		$sm 		= new Suratmasuk();
		$nosurat	=$_POST['nosurat'];
		$tanggal	=$_POST['tanggal'];
		$perihal	=$_POST['perihal'];
		$pengirim	=$_POST['pengirim'];
		$uraian		=$_POST['uraian'];
		
		//attachment
		$FileName	= $_FILES['upload']['name'];
		$TempName	= $_FILES['upload']['tmp_name'];
		$ext	=  pathinfo($FileName, PATHINFO_EXTENSION);
		
		if(empty($ruang)||empty($rak)||empty($baris)||empty($box)||empty($nosurat)||empty($tanggal)||empty($perihal)||empty($pengirim)||empty($uraian)){
			$error_rekam="Semua Field Harus diisi!";
		}
		//attachment ad atau gak
		elseif(empty($FileName)){
			//$error_rekam="File Tidak Ditemukan!";
			$new_file_name=$_POST['attachment'];
			
			//autokeyword
			$autokeyword = new Autokeyword();
			$stopwords = file('../includes/stopwords/stopword_list_tala.txt');
			$data = $perihal.$pengirim.$uraian;
			$keywords = $autokeyword->getKeywords($data,$stopwords);
			
			//rekam arsip
			$rekam	=$sm->updateSm($id,$nama,$ruang,$rak,$baris,$box,$keywords,$nosurat,$tanggal,$perihal,$pengirim,$uraian,$new_file_name);
				
				if($rekam ==1){
					$success="Arsip Berhasil Diupdate";
					header("refresh:3;suratmasuk.php");

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
				$data = $perihal.$pengirim.$uraian;
				$keywords = $autokeyword->getKeywords($data,$stopwords);
				
				//rename attachment
				$date=date("dmYHis");
				$new_file_name=$date.$FileName;
				$path="../attachment/surat/masuk/".$new_file_name;
				//upload
				move_uploaded_file ($_FILES['upload']['tmp_name'],$path);
				
				//rekam arsip
				$rekam	=$sm->updateSm($id,$nama,$ruang,$rak,$baris,$box,$keywords,$nosurat,$tanggal,$perihal,$pengirim,$uraian,$new_file_name);
				
					if($rekam ==1){
						$success="Arsip Berhasil Diupdate";
						header("refresh:3;suratmasuk.php");

					}else{
						$error_rekam="Arsip Tidak Berhasil Di Ubah";
					}	
		}
	}

	if (isset($_GET['delete'])){

		$sm = new Suratmasuk();
		$id	=$_GET['delete'];
		session_start();
		
		$hapus=$sm->deleteSm($id);
		if($hapus=1){
			$success="Arsip Surat Masuk Berhasil di Hapus";
			header ("location: suratmasuk.php");
		}else{
			$error_delete="Arsip Surat Masuk Gagal di hapus";
		}
	}	

?>