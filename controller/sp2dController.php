<?php
/**
 * @author freaksmj
 */
 
	include_once('../class/arsip.php');
	include_once('../class/ruang.php');
	include_once('../class/sp2d.php');
	include_once('../class/autokeyword.php');
	
	//dropdown ruang
	$ruang = new Ruang();
	$all_ruang=$ruang->getAllruang();
	
	//edit-view all arsip
	$arsip = new Arsip();
	$jenis=3;
	$all=$arsip->getAllarsip($jenis);

	//getLoad
	$sp2d = new Sp2d();
	$data_sp2d=$sp2d->getLoad();
		
	//load sp2d
	if (isset($_POST['load_sp2d'])){
		
		$sp2d = new Sp2d();	
		$date	=$_POST['date'];
		
		if(empty($date)){
			$error="Pilih tgl SP2D terlebih dahulu";
		}else{
			
			$data_sp2d=$sp2d->loadSp2d($date);
			//var_dump($data_sp2d);
			if($data_sp2d==0){				
				$error="Tidak Terdapat SP2D untuk tanggal : ".$date."";
			}else{
				$data_sp2d=$sp2d->loadSp2d($date);
				header("location:sp2d.php?modul=view_sp2d");
			}
		}
	}
	
	if(isset($_GET['id'])){
		$sp2d = new Sp2d();
		$id	=$_GET['id'];
		
		$sp2d_detail=$sp2d->getSp2ddetail($id);
	}
	
	//rekam arsip sp2d
	if(isset($_POST['rekam_sp2d'])){

		//input arsip
		$arsip			= new Arsip();
		$jenis_arsip	=3;
		$nama			=$_POST['nama'];
		$ruang			=$_POST['ruang'];
		$rak			=$_POST['rak'];
		$baris			=$_POST['baris'];
		$box			=$_POST['box'];
		
		$sp2d 		= new Sp2d();
		$nosp2d		=$_POST['nosp2d'];
		$kepada		=$_POST['uraiben'];
		$uraian		=$_POST['uraian'];
		
		//attachment
		$FileName	= $_FILES['upload']['name'];
		$TempName	= $_FILES['upload']['tmp_name'];
		$ext	=  pathinfo($FileName, PATHINFO_EXTENSION);
		
		if(empty($ruang)||empty($rak)||empty($baris)||empty($box)||empty($nama)){
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
				
				//autokeyword
				$autokeyword = new Autokeyword();
				$stopwords = file('../includes/stopwords/stopword_list_tala.txt');
				$data = $nama.$kepada.$uraian;
				$keywords = $autokeyword->getKeywords($data,$stopwords);
				//var_dump($keywords);

				//rename attachment
				$date=date("dmYHis");
				$new_file_name=$date.$FileName;
				$path="../attachment/sp2d/".$new_file_name;
				//upload
				move_uploaded_file ($_FILES['upload']['tmp_name'],$path);
				
				//rekam arsip
				$rekam	=$sp2d->addSp2d($jenis_arsip,$nama,$ruang,$rak,$baris,$box,$keywords,$nosp2d,$arsip_id,$new_file_name);

				if($rekam ==1){
					$success="Arsip Berhasil Direkam";
					header("refresh:3;sp2d.php?modul=view_sp2d");
					
				}else{
					$error_rekam="arsip Sp2d Sudah Terdapat Pada Database";
				}	
		}
	}

	if(isset($_GET['id'])){
		$sp2d = new Sp2d();
		$id	=$_GET['id'];
		
		$ubah=$sp2d->getSp2d($id);
	}	
	
	//ubah arsip sp2d
	if(isset($_POST['update_sp2d'])){

		//input arsip
		$arsip			= new Arsip();
		$jenis_arsip	=3;
		$id				=$_POST['id_ubah'];
		$nama			=$_POST['nama'];
		$ruang			=$_POST['ruang'];
		$rak			=$_POST['rak'];
		$baris			=$_POST['baris'];
		$box			=$_POST['box'];
		
		$sp2d 		= new Sp2d();
		$nosp2d		=$_POST['nosp2d'];
		$kepada		=$_POST['uraiben'];
		$uraian		=$_POST['uraian'];
		
		//attachment
		$FileName	= $_FILES['upload']['name'];
		$TempName	= $_FILES['upload']['tmp_name'];
		$ext	=  pathinfo($FileName, PATHINFO_EXTENSION);
		
		if(empty($ruang)||empty($rak)||empty($baris)||empty($box)||empty($nama)){
			$error_rekam="Semua Field Harus diisi!";
		}
		//attachment ad atau gak
		elseif(empty($FileName)){
			//$error_rekam="File Tidak Ditemukan!";
			$new_file_name=$_POST['attachment'];
			
			//autokeyword
			$autokeyword = new Autokeyword();
			$stopwords = file('../includes/stopwords/stopword_list_tala.txt');
			$data = $nama.$kepada.$uraian;
			$keywords = $autokeyword->getKeywords($data,$stopwords);

			//rekam arsip
			$rekam	=$sp2d->updateSp2d($id,$nama,$ruang,$rak,$baris,$box,$keywords,$new_file_name);
			if($rekam ==1){
				$success="Arsip Berhasil Di Update";
				header("refresh:3;sp2d.php?modul=view_all");
			}else{
				$error_rekam="Arsip tidak berhasil di ubah";
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
				$data = $nama.$kepada.$uraian;
				$keywords = $autokeyword->getKeywords($data,$stopwords);
				//var_dump($keywords);

				//rename attachment
				$date=date("dmYHis");
				$new_file_name=$date.$FileName;
				$path="../attachment/sp2d/".$new_file_name;
				//upload
				move_uploaded_file ($_FILES['upload']['tmp_name'],$path);
				
				//rekam arsip
				$rekam	=$sp2d->updateSp2d($id,$nama,$ruang,$rak,$baris,$box,$keywords,$new_file_name);
					if($rekam ==1){
						$success="Arsip Berhasil Di Update";
						header("refresh:3;sp2d.php?modul=view_all");
					
				}else{
					$error_rekam="Arsip tidak berhasil di ubah";
				}	
		}
	}

	if (isset($_GET['delete'])){

		$sp2d = new Sp2d();
		$id	=$_GET['delete'];
		session_start();
		
		$hapus=$sp2d->deleteSp2d($id);
		if($hapus=1){
			$success="Arsip Sp2d Berhasil di Hapus";
			header ("location: sp2d.php?modul=view_all");
		}else{
			$error_delete="Arsip Sp2d Gagal di hapus";
		}
	}		
	

	
	
?>