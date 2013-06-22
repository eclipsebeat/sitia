<?php
/**
 * @author freaksmj
 */
include_once('../config/class.database.php');

class Sp2d{

	public $db1;
	public $db2;
	
	function __construct(){
		$connect = new Database();
		$this->db1 = $connect->connectdb1();
		$this->db2 = $connect->connectdb2();
	}

	function loadSp2d($date){
		
		//langsung d masukin k tabel sp2d_detail	
		$query=$this->db1->prepare("INSERT INTO sp2d_detail (nosp2d,tgsp2d,kdsatker,nilaisp2d,uraiben,untuk) VALUES (?,?,?,?,?,?)");
		$query2=$this->db2->query("SELECT a.nosp2d, a.tgsp2d, a.kdsatker, b.totnilmak-b.totnilmap AS nilaisp2d, CONCAT(a.uraiben1,a.uraiben2) AS uraiben, CONCAT(a.untuk1,a.untuk2,a.untuk3,a.untuk4,a.untuk5,a.untuk6,a.untuk7,a.untuk8) AS untuk FROM m_spminfo AS a RIGHT JOIN m_spmind AS b ON a.nosp2d=b.nosp2d where a.tgsp2d='$date' ORDER BY nosp2d ASC");
		$sp2d=$query2->fetchAll();
		//var_dump($sp2d);
		
		foreach($sp2d as $row){
			$data=array($row['nosp2d'],$row['tgsp2d'],$row['kdsatker'],$row['nilaisp2d'],$row['uraiben'],$row['untuk']);
			$query->execute($data);
			//var_dump($row);
		}
		$jml_data=$query->rowCount();
		return $jml_data;
	}
	
	//tampilkan sp2d yg baru d load blom punya arsip_id
	function getLoad(){
		$query=$this->db1->query("SELECT*FROM sp2d_detail where arsip_id is NULL ORDER BY nosp2d");
		$jml_data=$query->rowCount();
		if($jml_data>=1){
			$hasil=$query->fetchAll();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	//rekam
	function addSp2d($jenis_arsip,$nama,$ruang,$rak,$baris,$box,$keyword,$nosp2d,$arsip_id,$attachment){
		$this->db1->beginTransaction();
		
		$query=$this->db1->prepare("INSERT INTO arsip(jenisarsip_id,nama_arsip,ruang,rak,baris,box,keyword,input_date,last_update) VALUES (?,?,?,?,?,?,?,?,?)");
		$input_date=date("Y-m-d");
		$last_update=date("Y-m-d");
		$data=array($jenis_arsip,$nama,$ruang,$rak,$baris,$box,$keyword,$input_date,$last_update);
		$query->execute($data);
		
		$lastInsertId=$this->db1->lastInsertId();
		$query2=$this->db1->query("UPDATE sp2d_detail SET arsip_id='$lastInsertId',attachment='$attachment' WHERE nosp2d='$nosp2d'");
		$this->db1->commit();
		$jml_data=$query->rowCount();
		return $jml_data;
	}
	
	//ambil detail bua rekam
	function getSp2ddetail($id){
		$query=$this->db1->query("SELECT * from sp2d_detail where nosp2d='$id'");
		$jml_data=$query->rowCount();
		if($jml_data==1){
			$hasil=$query->fetchALL();
			return $hasil;
		}else{
			return $jml_data;
		}
		
	}
	
	//ambil data arsip sp2d buat ubah
	function getSp2d($id){
		$query=$this->db1->query("SELECT a.arsip_id,a.nama_arsip,c.nama_ruang,a.rak,a.baris,a.box,a.keyword,b.nosp2d,b.tgsp2d,b.kdsatker,b.nilaisp2d,b.uraiben,b.untuk,b.attachment FROM arsip as a RIGHT JOIN  sp2d_detail as b on a.arsip_id=b.arsip_id, ruang as c WHERE  a.ruang=c.ruang_id  AND a.arsip_id='$id'");
		$jml_data=$query->rowCount();
		if($jml_data==1){
			$hasil=$query->fetchALL();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	//ubah
	function updateSp2d($id,$nama,$ruang,$rak,$baris,$box,$keyword,$attachment){
		$this->db1->beginTransaction();
		$last_upadate=date("Y-m-d");
		$query=$this->db1->query("UPDATE arsip SET nama_arsip='$nama',ruang='$ruang',rak='$rak',baris='$baris',box='$box',keyword='$keyword',last_update='$last_update' WHERE arsip_id='$id'");
		$query2=$this->db1->query("UPDATE sp2d_detail SET attachment='$attachment' WHERE nosp2d='$id'");
		$this->db1->commit();
		$jml_data=$query->rowCount();
		return $jml_data;
	}
	
	//hapus
	function deleteSp2d($id){
		$query=$this->db1->query("DELETE arsip,sp2d_detail FROM arsip,sp2d_detail WHERE sp2d_detail.arsip_id = arsip.arsip_id  AND arsip.arsip_id='$id'");
		$jml_data=$query->rowCount();
		return $jml_data;
	}
	

}
?>