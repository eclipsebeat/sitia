<?php
/**
 * @author freaksmj
 */
include_once('../config/class.database.php');

class Notifikasi{

	public $db1;
	public $db2;
	
	function __construct(){
		$connect = new Database();
		$this->db1 = $connect->connectdb1();
		$this->db2 = $connect->connectdb2();
	}

	/*ilank d input d pinjam
	function addNotifikasi($pinjam_id,$message){

		$input_date=date("Y-m-d");
		$query=$this->db1->prepare("INSERT INTO notifikasi(pinjam_id,message,input_date) VALUES(?,?,?)");
		$data=array($pinjam_id,$message,$input_date);
		$query->execute($data);
		$jml_data=$query->rowCount();
		return $jml_data;
	}*/
	
	function getAllNotifikasi(){
		$query=$this->db1->query("SELECT*FROM notifikasi WHERE notif_stat='0'");
		$jml_data=$query->rowCount();
		if($jml_data>=1){
			$hasil=$query->fetchAll();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	function getJmlnotif(){
		$query=$this->db1->query("SELECT COUNT(*) jumlah FROM notifikasi WHERE notif_stat='0'");
		$jml_data=$query->rowCount();
		if($jml_data>=1){
			$hasil=$query->fetchAll();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	function readNotif($id,$notif_stat){
		$query=$this->db1->query("UPDATE notifikasi SET notif_stat='$notif_stat' WHERE notif_id='$id'");
		$jml_data=$query->rowCount();
		return $jml_data;
	}

}
?>