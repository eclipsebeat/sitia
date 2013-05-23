<?php
/**
 * @author freaksmj
 */
include_once('../config/class.database.php');

class Spjbendum{

	public $db1;
	public $db2;
	
	function __construct(){
		$connect = new Database();
		$this->db1 = $connect->connectdb1();
		$this->db2 = $connect->connectdb2();
	}	

	function addArsipSpj($jenis_arsip,$nama,$ruang,$rak,$baris,$box,$keyword,$arsip_id,$tanggal,$uraian,$attachment){
		$this->db1->beginTransaction();
		
		$query=$this->db1->prepare("INSERT INTO arsip(jenisarsip_id,nama_arsip,ruang,rak,baris,box,keyword,input_date,last_update) VALUES (?,?,?,?,?,?,?,?,?)");
		$input_date=date("Y-m-d");
		$last_update=date("Y-m-d");
		$data=array($jenis_arsip,$nama,$ruang,$rak,$baris,$box,$keyword,$input_date,$last_update);
		$query->execute($data);
		
		$lastInsertId=$this->db1->lastInsertId();
		$query2=$this->db1->prepare("INSERT INTO spj_detail(arsip_id,tanggal,uraian,attachment) VALUES (?,?,?,?)");
		$data2=array($lastInsertId,$tanggal,$uraian,$attachment);
		$query2->execute($data2);
		
		$this->db1->commit();
		$jml_data=$query->rowCount();
		return $jml_data;
	}	

	function getTgl($tanggal){
		$query=$this->db1->query("SELECT*FROM spj_detail WHERE tanggal='$tanggal'");
		$jml_data=$query->rowCount();
		if($jml_data==1){
			$hasil=$query->fetchALL();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	function getSpj($id){
		$query=$this->db1->query("SELECT a.arsip_id,a.nama_arsip,c.nama_ruang,a.rak,a.baris,a.box,a.keyword,b.tanggal,b.uraian,b.attachment FROM arsip as a RIGHT JOIN  spj_detail as b on a.arsip_id=b.arsip_id, ruang as c WHERE  a.ruang=c.ruang_id AND a.arsip_id='$id'");
		$jml_data=$query->rowCount();
		if($jml_data==1){
			$hasil=$query->fetchALL();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	function updateSpj($id,$nama,$ruang,$rak,$baris,$box,$keyword,$arsip_id,$tanggal,$uraian,$attachment){
		$this->db1->beginTransaction();
		$query=$this->db1->query("UPDATE arsip SET nama_arsip='$nama',ruang='$ruang',rak='$rak',baris='$baris',box='$box',keyword='$keyword',last_update='$last_update' WHERE arsip_id='$id'");

		$query2=$this->db1->query("UPDATE spj_detail SET tanggal='$tanggal', uraian='$uraian', attachment='$attachment' WHERE arsip_id='$id'");
		$this->db1->commit();
		$jml_data=$query->rowCount();
		return $jml_data;	
	}
	
	function deleteSpj($id){
		$query=$this->db1->query("DELETE arsip,spj_detail FROM arsip,spj_detail WHERE spj_detail.arsip_id = arsip.arsip_id  AND arsip.arsip_id='$id'");
		$jml_data=$query->rowCount();
		return $jml_data;
	}	
}	
?>