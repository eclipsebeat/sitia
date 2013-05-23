<?php
/**
 * @author freaksmj
 */
include_once('../config/class.database.php');

class Seksi{

	public $db1;
	public $db2;
	
	function __construct(){
		$connect = new Database();
		$this->db1 = $connect->connectdb1();
		$this->db2 = $connect->connectdb2();
	}

	function getAllseksi(){
		$query=$this->db1->query("SELECT*FROM seksi");
		$jml_data=$query->rowCount();
		if($jml_data>=1){
			$hasil=$query->fetchAll();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	

}	
?>