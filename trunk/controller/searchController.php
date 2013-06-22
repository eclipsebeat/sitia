<?php
/**
 * @author freaksmj
 */
	
	include_once('../class/arsip.php');
	include_once('../class/jenis_arsip.php');	
	include_once('../class/ruang.php');	
	include_once('../class/search.php');

	//dropdown ruang
	$ruang = new Ruang();
	$all_ruang=$ruang->getAllruang();
	
	//dropdown jenis arsip
	$jenis = new JenisArsip();
	$all_jenis=$jenis->getAllJenisarsip();
	
	$search = new Search();
	
	if(isset($_POST['search'])){
		$keywords=$_POST['keyword'];
		if(empty($keywords)){
			$error_search="Kata Kunci Pencarian Kosong";
			//$hasil=$search->search($keywords);
		}elseif(strlen($keywords) <= 3){
			$error_search="Kata Kunci Pencarian Terlalu Pendek";
		}else{
			$data=$search->search($keywords);
			if($data==0){
				$error_search="Data Tidak Di temukan";
			}else{
				//$success="Berikut Merupakan Hasil Pencarian";
				$data=$search->search($keywords);
			}
		}
	} else {
		$arsip = new Arsip();
		$jenis=NULL;
		$data=$arsip->getAllarsip($jenis);		
	}
	
	if(isset($_POST['advancesearch'])){
		$keywords	=$_POST['nama'];
		$jenisarsip	=$_POST['jenis'];
		$ruangarsip	=$_POST['ruang'];

			$data=$search->advanceSearch($keywords,$jenisarsip,$ruangarsip);
			if($data==0){
				$error_search="Data Tidak Di temukan";
			}else{
				//$success="Berikut Merupakan Hasil Pencarian";
				$data=$search->advanceSearch($keywords,$jenisarsip,$ruangarsip);
			}
		
	} else {
		$arsip = new Arsip();
		$jenis=NULL;
		$data=$arsip->getAllarsip($jenis);		
	}
	
	
?>