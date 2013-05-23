<?php
/**
 * @author freaksmj
 */
include_once('../config/class.database.php');

class Ruang{

	public $db1;
	public $db2;
	
	function __construct(){
		$connect = new Database();
		$this->db1 = $connect->connectdb1();
		$this->db2 = $connect->connectdb2();
	}	
	
	function addRuang($koderuang,$namaruang){
		$input_date=date("Y-m-d");
		$last_update=date("Y-m-d");
		$query=$this->db1->prepare("INSERT INTO ruang(kode_ruang,nama_ruang,input_date,last_update) VALUES (?,?,?,?)");
		$data=array($koderuang,$namaruang,$input_date,$last_update);
		$query->execute($data);
		$jml_data=$query->rowCount();
		return $jml_data;
	}
	
	function getRuang($koderuang){
		$query=$this->db1->query("SELECT*FROM ruang WHERE kode_ruang='$koderuang'");
		$jml_data=$query->rowCount();
		if($jml_data==1){
			$hasil=$query->fetchALL();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	function getRuangdetail($id){
		$query=$this->db1->query("SELECT*FROM ruang WHERE ruang_id='$id'");
		$jml_data=$query->rowCount();
		if($jml_data==1){
			$hasil=$query->fetchALL();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	function getAllruang(){
		$query=$this->db1->query("SELECT*FROM ruang");
		$jml_data=$query->rowCount();
		if($jml_data>=1){
			$hasil=$query->fetchAll();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	function deleteRuang($id){
		$query=$this->db1->query("DELETE FROM ruang WHERE ruang_id='$id'");
		$jml_data=$query->rowCount();
		return $jml_data;
	}
	
	function updateRuang($id,$koderuang,$namaruang){
		$last_update=date("Y-m-d");
		$query=$this->db1->query("UPDATE ruang SET kode_ruang='$koderuang',nama_ruang='$namaruang',last_update='$last_update' WHERE ruang_id='$id'");
		$jml_data=$query->rowCount();
		return $jml_data;
	}

}


?>