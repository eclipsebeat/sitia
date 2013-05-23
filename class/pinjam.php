<?php
/**
 * @author freaksmj
 */
include_once('../config/class.database.php');

class Pinjam{

	public $db1;
	public $db2;
	
	function __construct(){
		$connect = new Database();
		$this->db1 = $connect->connectdb1();
		$this->db2 = $connect->connectdb2();
	}	
	
	function pinjam($id,$pinjam_id,$arsip_id,$user_id,$tgl_kembali,$uraian,$stats){
		$this->db1->beginTransaction();
		$query=$this->db1->prepare("INSERT INTO pinjam(arsip_id,user_id,tgl_pinjam,tgl_kembali,uraian) VALUES(?,?,?,?,?)");
		$tgl_pinjam=date("Y-m-d");
		$data=array($pinjam_id,$arsip_id,$user_id,$tgl_pinjam,$tgl_kembali,$uraian);
		$query->execute($data);
		
		$query2=$this->db1->query("UPDATE arsip SET status_pinjam='$stats' WHERE arsip_id='$id'");
		$this->db1->commit();
		$jml_data=$query->rowCount();
		return $jml_data;
	}
	
	function getAllpinjam($stats){
		$query=$this->db1->query("SELECT a.arsip_id,a.jenisarsip_id,a.nama_arsip,c.nama_ruang,a.rak,a.baris,a.box,d.tgl_pinjam,d.tgl_kembali FROM arsip as a RIGHT JOIN  jenis_arsip as b on a.jenisarsip_id=b.jenisarsip_id,ruang as c,pinjam as d WHERE a.ruang=c.ruang_id AND a.status_pinjam='$stats' ORDER BY d.pinjam_id");
		$jml_data=$query->rowCount();
		if($jml_data>=1){
			$hasil=$query->fetchAll();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	function kembali($id,$stats){
		$this->db1->beginTransaction();
		$tgl_kembali=date("Y-m-d");
		$query=$this->db1->query("UPDATE pinjam SET tgl_kembali='$tgl kembali' WHERE pinjam_id='$id'");
		
		$query2=$this->db1->query("UPDATE arsip SET status_pinjam='$stats' WHERE arsip_id='$id'");
		$this->db1->commit();
		$jml_data=$query->rowCount();
		return $jml_data;
	}
 }
?>