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
	
	//update !!
	function pinjam($id,$arsip_id,$user_id,$tgl_akhir,$uraian,$stats,$message){
		$this->db1->beginTransaction();
		$query=$this->db1->prepare("INSERT INTO pinjam(arsip_id,user_id,tgl_pinjam,tgl_akhir,uraian) VALUES(?,?,?,?,?)");
		$tgl_pinjam=date("Y-m-d");
		$data=array($arsip_id,$user_id,$tgl_pinjam,$tgl_akhir,$uraian);
		$query->execute($data);
		
		$lastInsertId=$this->db1->lastInsertId();
		$query2=$this->db1->prepare("INSERT INTO notifikasi(pinjam_id,message,input_date) VALUES(?,?,?)");
		$data2=array($lastInsertId,$message,$tgl_pinjam);
		$query2->execute($data2);
		
		$query3=$this->db1->query("UPDATE arsip SET status_pinjam='$stats' WHERE arsip_id='$id'");
		$this->db1->commit();
		$jml_data=$query->rowCount();
		return $jml_data;
	}
	
	//update!!
	function kembali($id,$stats,$pinjam_id,$notif_stat){
		$this->db1->beginTransaction();
		$tgl_kembali=date("Y-m-d");
		$query=$this->db1->query("UPDATE pinjam SET tgl_kembali='$tgl_kembali' WHERE pinjam_id='$pinjam_id'");
	
		$query2=$this->db1->query("UPDATE arsip SET status_pinjam='$stats' WHERE arsip_id='$id'");
		
		$query3=$this->db1->query("UPDATE notifikasi SET notif_stat='$notif_stat' WHERE pinjam_id='$pinjam_id'");

		$this->db1->commit();
		$jml_data=$query->rowCount();
		return $jml_data;
	}
	
	//tampilkan data d form pinjam
	function getArsippinjam($id){
		$query=$this->db1->query("SELECT a.arsip_id,a.nama_arsip,b.nama_ruang,a.rak,a.baris,a.box FROM arsip as a RIGHT JOIN ruang as b ON  a.ruang=b.ruang_id  WHERE a.arsip_id='$id'");
		$jml_data=$query->rowCount();
		if($jml_data==1){
			$hasil=$query->fetchALL();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	//tampilkan arsip yang akan dikembalikan
	function getPinjam($users){
		$query=$this->db1->query("SELECT a.arsip_id,a.jenisarsip_id,a.nama_arsip,c.nama_ruang,a.rak,a.baris,a.box,d.pinjam_id,d.user_id,d.tgl_pinjam,d.tgl_kembali,d.uraian 
								FROM arsip as a RIGHT JOIN  jenis_arsip as b on a.jenisarsip_id=b.jenisarsip_id,ruang as c,pinjam as d 
								WHERE a.ruang=c.ruang_id AND a.status_pinjam='Y' AND a.arsip_id=d.arsip_id AND user_id=$users AND tgl_kembali is NULL ORDER BY d.pinjam_id");
		$jml_data=$query->rowCount();
		if($jml_data>=1){
			$hasil=$query->fetchAll();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	//dibuah - tambah field tgl_akhir (blom)
	function getAllPinjam(){
		$query=$this->db1->query("SELECT a.pinjam_id, b.jenisarsip_id,d.nama_jenisarsip,a.arsip_id,b.nama_arsip,a.tgl_pinjam,a.tgl_kembali,a.uraian,a.user_id,c.username,c.NIP
								  FROM pinjam as a
								  RIGHT JOIN arsip as b ON a.arsip_id=b.arsip_id,users AS c, jenis_arsip AS d  
								  WHERE  a.user_id=c.user_id AND b.jenisarsip_id=d.jenisarsip_id
								  ORDER BY a.pinjam_id");
		$jml_data=$query->rowCount();
		if($jml_data>=1){
			$hasil=$query->fetchAll();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	//tambah
	function getJeda(){
		$query=$this->db1->query("SELECT a.arsip_id,a.nama_arsip,c.nama_ruang,a.rak,a.baris,a.box,d.pinjam_id,d.user_id,b.username,d.tgl_pinjam,d.tgl_kembali,d.tgl_akhir,d.uraian 
									FROM arsip as a,pinjam as d 
									RIGHT JOIN  users as b on d.user_id=b.user_id,ruang as c
									WHERE a.ruang=c.ruang_id AND a.status_pinjam='Y' AND a.arsip_id=d.arsip_id AND tgl_kembali is NULL AND DATEDIFF(d.tgl_akhir,CURDATE())='1' ");
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