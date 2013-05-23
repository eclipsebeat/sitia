<?php
/**
 * @author freaksmj
 */
 
	include_once('../class/arsip.php');
	include_once('../class/ruang.php');
	include_once('../class/seksi.php');	
	include_once('../class/lkpp.php');
	include_once('../class/spjbendum.php');
	include_once('../class/suratmasuk.php');
	include_once('../class/suratkeluar.php');
	include_once('../class/sp2d.php');
	
	//dropdown ruang
	$ruang = new Ruang();
	$all_ruang=$ruang->getAllruang();

	//dropdown ruang
	$seksi = new Seksi();
	$all_seksi=$seksi->getAllseksi();
	
	//view all arsip
	$arsip = new Arsip();
	$all=$arsip->getAllarsip();
	
	//$sp2d = new Sp2d();
		
	//load sp2d
	if (isset($_POST['load_sp2d'])){
		
		$sp2d = new Sp2d();	
		$date	=$_POST['date'];
		
		if(empty($date)){
			$error="Pilih tgl SP2D terlebih dahulu";
		}else{
			$data_sp2d=$sp2d->getSp2d($date);
			//var_dump($data_sp2d);
			if($data_sp2d==0){
			$data_sp2d=$sp2d->getSp2d($date);
				$error="Tidak Terdapat SP2D untuk tanggal : ".$date."";
			}else{
			$data_sp2d=$sp2d->getSp2d($date);
			//header("location:tes.php?modul=view_sp2d");
			}
		}
	}
	
	//rekam arsip lkpp
	if(isset($_POST['rekam_lkpp'])){

		//input arsip
		$arsip			= new Arsip();
		$jenis_arsip	='5';
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
				$rekam	=$arsip->addArsiplkpp($jenis_arsip,$nama,$ruang,$rak,$baris,$box,$keyword,$arsip_id,$tanggal,$uraian,$new_file_name);
				//rekam tabel lkpp_detail
				//$rekam2	=$lkpp->addlkpp($arsip_id,$periode,$uraian,$new_file_name);
				
				if($rekam ==1){
					$success="Arsip Berhasil Direkam";
					header("refresh:3;arsip.php");
				}
		}
	}
	
	//rekam arsip surat masuk
	if(isset($_POST['rekam_sm'])){

		//input arsip
		$arsip			= new Arsip();
		$jenis_arsip	='1';
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
				//rename attachment
				$date=date("dmYHis");
				$new_file_name=$date.$FileName;
				$path="../attachment/surat/masuk/".$new_file_name;
				//upload
				move_uploaded_file ($_FILES['upload']['tmp_name'],$path);
				
				//rekam arsip
				$rekam	=$arsip->addArsipSm($jenis_arsip,$nama,$ruang,$rak,$baris,$box,$keyword,$arsip_id,$nosurat,$tanggal,$perihal,$pengirim,$uraian,$new_file_name);
				
				if($rekam ==1){
					$success="Arsip Berhasil Direkam";
					header("refresh:3;arsip.php");
				}
		}
	}
	
	//rekam arsip surat keluar
	if(isset($_POST['rekam_sk'])){

		//input arsip
		$arsip			= new Arsip();
		$jenis_arsip	='2';
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
				//rename attachment
				$date=date("dmYHis");
				$new_file_name=$date.$FileName;
				$path="../attachment/surat/keluar/".$new_file_name;
				//upload
				move_uploaded_file ($_FILES['upload']['tmp_name'],$path);
				
				//rekam arsip
				$rekam	=$arsip->addArsipSk($jenis_arsip,$nama,$ruang,$rak,$baris,$box,$keyword,$arsip_id,$nosurat,$tanggal,$perihal,$kepada,$penerbit,$uraian,$new_file_name);
				if($rekam ==1){
					$success="Arsip Berhasil Direkam";
					header("refresh:3;arsip.php");
				}
		}
	}

	//rekam arsip spj bendum
	if(isset($_POST['rekam_spj'])){

		//input arsip
		$arsip			= new Arsip();
		$jenis_arsip	='4';
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
				//rename attachment
				$date=date("dmYHis");
				$new_file_name=$date.$FileName;
				$path="../attachment/spj/".$new_file_name;
				//upload
				move_uploaded_file ($_FILES['upload']['tmp_name'],$path);
				
				//rekam arsip
				$rekam	=$arsip->addArsipSpj($jenis_arsip,$nama,$ruang,$rak,$baris,$box,$keyword,$arsip_id,$tanggal,$uraian,$new_file_name);
				
				if($rekam ==1){
					$success="Arsip Berhasil Direkam";
					header("refresh:3;arsip.php");
				}
		}
	}

	if(isset($_GET['jenisarsip_id']) && isset($_GET['id'])){
			$sm 	= new Suratmasuk();
			$sk 	= new Suratkeluar();
			$sp2d 	= new Sp2d();
			$spj 	= new Spjbendum();	
			$lkpp 	= new Lkpp();
			
			$jenis	=$_GET['jenis'];
			$id		=$_GET['id'];
			if($jenis=1){
				$detail1=$sm->getSuratmasuk($id);
			}
			elseif($jenis=2){
				$detail2=$sk->getSuratkeluar($id);
			}
			elseif($jenis=3){
				$detail3=$sp2d->getSp2d($id);
			}
			elseif($jenis=4){
				$detail4=$spj->getSpjbendum($id);
			}
			elseif($jenis=5){
				$detail5=$lkpp->getSuratmasuk($id);
			}

	}
?>