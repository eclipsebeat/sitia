<?php
/**
 * @author freaksmj
 */
include_once('../config/class.database.php');

class JenisArsip{

	public $db1;
	public $db2;
	
	function __construct(){
		$connect = new Database();
		$this->db1 = $connect->connectdb1();
		$this->db2 = $connect->connectdb2();
	}	
	
	function addJenisArsip($nama,$retensi,$uraian){
		$input_date=date("Y-m-d");
		$last_update=date("Y-m-d");
		$query=$this->db1->prepare("INSERT INTO jenis_arsip(nama_jenisarsip,masa_retensi,uraian,input_date,last_update) VALUES (?,?,?,?,?)");
		$data=array($nama,$retensi,$uraian,$input_date,$last_update);
		$query->execute($data);
		$jml_data=$query->rowCount();
		return $jml_data;
	}
	
	function getJenisarsip($nama){
		$query=$this->db1->query("SELECT*FROM jenis_arsip WHERE nama_jenisarsip='$nama'");
		$jml_data=$query->rowCount();
		if($jml_data==1){
			$hasil=$query->fetchALL();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	function getJenisarsipdetail($id){
		$query=$this->db1->query("SELECT*FROM jenis_arsip WHERE jenisarsip_id='$id'");
		$jml_data=$query->rowCount();
		if($jml_data==1){
			$hasil=$query->fetchALL();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	function getAllJenisarsip(){
		$query=$this->db1->query("SELECT*FROM jenis_arsip");
		$jml_data=$query->rowCount();
		if($jml_data>=1){
			$hasil=$query->fetchAll();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	function deleteJenisarsip($id){
		$query=$this->db1->query("DELETE FROM jenis_arsip WHERE jenisarsip_id='$id'");
		$jml_data=$query->rowCount();
		return $jml_data;
	}
	
	function updateJenisarsip($id,$nama,$retensi,$uraian){
		$last_update=date("Y-m-d");
		$query=$this->db1->query("UPDATE jenis_arsip SET nama_jenisarsip='$nama',masa_retensi='$retensi',uraian='$uraian',last_update='$last_update' WHERE jenisarsip_id='$id'");
		$jml_data=$query->rowCount();
		return $jml_data;
	}

}


?>