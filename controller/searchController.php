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
		//tes search speed
		//$time_start = microtime(true); 		
		$keywords=$_POST['keyword'];
		if(empty($keywords)){
			$error_search="Kata Kunci Pencarian Kosong";
			//$hasil=$search->search($keywords);
		}elseif(strlen($keywords) <= 3){
			$error_search="Kata Kunci Pencarian Terlalu Pendek";
		}else{
			$data_cari=$search->search($keywords);
			if($data_cari==0){
				$error_search="Data Tidak Di temukan";
			}else{
				//$success="Berikut Merupakan Hasil Pencarian";
				$data_cari=$search->search($keywords);
			}
		}
		//tes search speed
		//$time_end = microtime(true);
		//$execution_time = round(($time_end - $time_start),5);
		//echo '<b>Total Execution Time:</b> '.$execution_time.' Seconds';			
	} else {
		$arsip = new Arsip();
		$data=$arsip->getLastarsip();		
	}
	
	if(isset($_POST['advancesearch'])){
		$keywords	=$_POST['nama'];
		$jenisarsip	=$_POST['jenis'];
		$ruangarsip	=$_POST['ruang'];

			$data_cari2=$search->advanceSearch($keywords,$jenisarsip,$ruangarsip);
			if($data_cari2==0){
				$error_search="Data Tidak Di temukan";
			}else{
				//$success="Berikut Merupakan Hasil Pencarian";
				$data_cari2=$search->advanceSearch($keywords,$jenisarsip,$ruangarsip);
			}
		
	} 
	
	
?>