<?php
/**
 * @author freaksmj
 */
include_once('../config/class.database.php');

class Suratkeluar{

	public $db1;
	public $db2;
	
	function __construct(){
		$connect = new Database();
		$this->db1 = $connect->connectdb1();
		$this->db2 = $connect->connectdb2();
	}	

	function addArsipSk($jenis_arsip,$nama,$ruang,$rak,$baris,$box,$keyword,$arsip_id,$nosurat,$tanggal,$perihal,$kepada,$penerbit,$uraian,$attachment){
		$this->db1->beginTransaction();
		
		$query=$this->db1->prepare("INSERT INTO arsip(jenisarsip_id,nama_arsip,ruang,rak,baris,box,keyword,input_date,last_update) VALUES (?,?,?,?,?,?,?,?,?)");
		$input_date=date("Y-m-d");
		$last_update=date("Y-m-d");
		$data=array($jenis_arsip,$nama,$ruang,$rak,$baris,$box,$keyword,$input_date,$last_update);
		$query->execute($data);
		
		$lastInsertId=$this->db1->lastInsertId();
		$query2=$this->db1->prepare("INSERT INTO suratkeluar_detail(arsip_id,no_surat,tanggal,perihal,kepada,penerbit,uraian,attachment) VALUES (?,?,?,?,?,?,?,?)");
		$data2=array($lastInsertId,$nosurat,$tanggal,$perihal,$kepada,$penerbit,$uraian,$attachment);
		$query2->execute($data2);
		
		$this->db1->commit();
		$jml_data=$query2->rowCount();
		return $jml_data;
	}

	function getNo($nosurat){
		$query=$this->db1->query("SELECT*FROM suratkeluar_detail WHERE no_surat='$nosurat'");
		$jml_data=$query->rowCount();
		if($jml_data==1){
			$hasil=$query->fetchALL();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	function getSk($id){
		$query=$this->db1->query("SELECT a.arsip_id,a.nama_arsip,d.nama_ruang,a.rak,a.baris,a.box,a.keyword,b.no_surat,b.tanggal,b.perihal,b.kepada,c.nmseksi,b.uraian,b.attachment FROM arsip as a RIGHT JOIN  suratkeluar_detail as b on a.arsip_id=b.arsip_id, seksi as c, ruang as d WHERE  a.ruang=d.ruang_id AND b.penerbit=c.kdseksi AND a.arsip_id='$id'");
		$jml_data=$query->rowCount();
		if($jml_data==1){
			$hasil=$query->fetchALL();
			return $hasil;
		}else{
			return $jml_data;
		}
	}

	function updateSk($id,$nama,$ruang,$rak,$baris,$box,$keyword,$nosurat,$tanggal,$perihal,$kepada,$penerbit,$uraian,$attachment){
		$this->db1->beginTransaction();
		$last_update=date("Y-m-d");		
		$query=$this->db1->query("UPDATE arsip SET nama_arsip='$nama',ruang='$ruang',rak='$rak',baris='$baris',box='$box',keyword='$keyword',last_update='$last_update' WHERE arsip_id='$id'");
		
		$query2=$this->db1->query("UPDATE suratkeluar_detail SET no_surat='$nosurat',tanggal='$tanggal',perihal='$perihal',kepada='$kepada',penerbit='$penerbit',uraian='$uraian',attachment='$attachment' WHERE arsip_id='$id'");
		
		$this->db1->commit();
		$jml_data=$query->rowCount();
		return $jml_data;	
	}

	function deleteSk($id){
		$query=$this->db1->query("DELETE arsip,suratkeluar_detail FROM arsip,suratkeluar_detail WHERE suratkeluar_detail.arsip_id = arsip.arsip_id  AND arsip.arsip_id='$id'");
		$jml_data=$query->rowCount();
		return $jml_data;
	}	
}	
?>