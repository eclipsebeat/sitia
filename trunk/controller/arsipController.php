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
	var_dump($all);
	
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
	
	if(isset($_GET['jenisarsip_id']) && isset($_GET['id'])){
			/*$sm 	= new Suratmasuk();
			$sk 	= new Suratkeluar();
			$sp2d 	= new Sp2d();
			$spj 	= new Spjbendum();	
			$lkpp 	= new Lkpp();*/
			$arsip = new Arsip();
			
			$jenis	=$_GET['jenis'];
			$id		=$_GET['id'];
			session_start();
			
			$detail=$arsip->getDetail($jenis,$id);
			
			/*if($jenis=1){
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
			}*/

	}
?>