<?php
/**
 * @author freaksmj
 */
include_once('../config/class.database.php');

class Arsip{

	public $db1;
	public $db2;
	
	function __construct(){
		$connect = new Database();
		$this->db1 = $connect->connectdb1();
		$this->db2 = $connect->connectdb2();
	}	
	
	/* d input d masing2 arsip
	function addArsip($jenis_arsip,$ruang,$rak,$baris,$box,$keyword){
		$input_date=date("Y-m-d");
		$last_update=date("Y-m-d");
		$query=$this->db1->prepare("INSERT INTO arsip(jenisarsip_id,ruang,rak,baris,box,keyword,input_date,last_update) VALUES (?,?,?,?,?,?,?,?)");
		$data=array($jenis_arsip,$ruang,$rak,$baris,$box,$keyword,$input_date,$last_update);
		$query->execute($data);
		$jml_data=$query->rowCount();
		return $jml_data;
	}*/
	
	//smntr buat LKPP
	function getArsip($nama){
		$query=$this->db1->query("SELECT*FROM arsip WHERE nama_arsip='$nama'");
		$jml_data=$query->rowCount();
		if($jml_data==1){
			$hasil=$query->fetchALL();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	//menampilkan data arsip
	function getAllarsip($jenis){
		if($jenis!=null){
			$query=$this->db1->query("SELECT a.arsip_id,a.jenisarsip_id,b.nama_jenisarsip,a.nama_arsip,c.nama_ruang,a.rak,a.baris,a.box FROM arsip as a RIGHT JOIN  jenis_arsip as b on a.jenisarsip_id=b.jenisarsip_id,ruang as c WHERE a.ruang=c.ruang_id AND a.jenisarsip_id='$jenis' ORDER BY a.arsip_id");
		}else{
			$query=$this->db1->query("SELECT a.arsip_id,a.jenisarsip_id,b.nama_jenisarsip,a.nama_arsip,c.nama_ruang,a.rak,a.baris,a.box FROM arsip as a RIGHT JOIN  jenis_arsip as b on a.jenisarsip_id=b.jenisarsip_id,ruang as c WHERE a.ruang=c.ruang_id ORDER BY a.arsip_id");
		}
		$jml_data=$query->rowCount();
		if($jml_data>=1){
			$hasil=$query->fetchAll();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	//menampilkan 10 arsip terakhir
	function getLastarsip(){
		$query=$this->db1->query("SELECT a.arsip_id,a.jenisarsip_id,b.nama_jenisarsip,a.nama_arsip,c.nama_ruang,a.rak,a.baris,a.box FROM arsip as a RIGHT JOIN  jenis_arsip as b on a.jenisarsip_id=b.jenisarsip_id,ruang as c WHERE a.ruang=c.ruang_id ORDER BY a.arsip_id DESC LIMIT 10");
		$jml_data=$query->rowCount();
		if($jml_data>=1){
			$hasil=$query->fetchAll();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	//menampilkan available arsip untuk dipinjam
	function getTersedia(){
		$query=$this->db1->query("SELECT a.arsip_id,a.jenisarsip_id,a.nama_arsip,c.nama_ruang,a.rak,a.baris,a.box FROM arsip as a RIGHT JOIN  jenis_arsip as b on a.jenisarsip_id=b.jenisarsip_id,ruang as c WHERE a.ruang=c.ruang_id AND a.status_pinjam='N' ORDER BY a.arsip_id");
		$jml_data=$query->rowCount();
		if($jml_data>=1){
			$hasil=$query->fetchAll();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	//mendapatkan id terakhir 
	function getLastId(){
		$query=$this->db1->query("SELECT MAX(arsip_id) FROM arsip");
		return $query;
	}

}


?>