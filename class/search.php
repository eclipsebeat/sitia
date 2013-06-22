<?php
/**
 * @author freaksmj
 */
include_once('../config/class.database.php');

class Search{

	public $db1;
	public $db2;
	
	function __construct(){
		$connect = new Database();
		$this->db1 = $connect->connectdb1();
		$this->db2 = $connect->connectdb2();
	}	
	
	function search($keywords){
		$query=$this->db1->query("SELECT a.arsip_id,a.jenisarsip_id,a.nama_arsip,a.keyword,c.nama_ruang,a.rak,a.baris,a.box,CONCAT(d.no_surat,'--',d.perihal,'--',d.pengirim,'--',d.uraian) AS detail,d.tanggal 
									FROM arsip as a RIGHT JOIN jenis_arsip as b on a.jenisarsip_id=b.jenisarsip_id,ruang as c,suratmasuk_detail as d 
									WHERE a.ruang=c.ruang_id AND a.arsip_id=d.arsip_id AND (a.nama_arsip LIKE '%$keywords%' OR a.keyword LIKE '%$keywords%' OR c.nama_ruang LIKE '%$keywords%' OR CONCAT(d.no_surat,'--',d.perihal,'--',d.pengirim,'--',d.uraian) LIKE '%$keywords%' OR d.tanggal LIKE '%$keywords%')
									UNION 
									SELECT a.arsip_id,a.jenisarsip_id,a.nama_arsip,a.keyword,c.nama_ruang,a.rak,a.baris,a.box,CONCAT(d.no_surat,'--',d.perihal,'--',d.kepada,'--',d.uraian) AS detail,d.tanggal 
									FROM arsip as a RIGHT JOIN jenis_arsip as b on a.jenisarsip_id=b.jenisarsip_id,ruang as c,suratkeluar_detail as d 
									WHERE a.ruang=c.ruang_id AND a.arsip_id=d.arsip_id AND (a.nama_arsip LIKE '%$keywords%' OR a.keyword LIKE '%$keywords%' OR c.nama_ruang LIKE '%$keywords%' OR CONCAT(d.no_surat,'--',d.perihal,'--',d.kepada,'--',d.uraian) LIKE '%$keywords%' OR d.tanggal LIKE '%$keywords%')
									UNION
									SELECT a.arsip_id,a.jenisarsip_id,a.nama_arsip,a.keyword,c.nama_ruang,a.rak,a.baris,a.box,CONCAT(d.nosp2d,'--',d.kdsatker,'--',d.nilaisp2d,'--',d.uraiben,d.untuk) AS detail,d.tgsp2d 
									FROM arsip as a RIGHT JOIN jenis_arsip as b on a.jenisarsip_id=b.jenisarsip_id,ruang as c,sp2d_detail as d 
									WHERE a.ruang=c.ruang_id AND a.arsip_id=d.arsip_id AND (a.nama_arsip LIKE '%$keywords%' OR a.keyword LIKE '%$keywords%' OR c.nama_ruang LIKE '%$keywords%' OR CONCAT(d.nosp2d,'--',d.kdsatker,'--',d.nilaisp2d,'--',d.uraiben,d.untuk) LIKE '%$keywords%' OR d.tgsp2d LIKE '%$keywords%')
									UNION
									SELECT a.arsip_id,a.jenisarsip_id,a.nama_arsip,a.keyword,c.nama_ruang,a.rak,a.baris,a.box,d.uraian,d.tanggal
									FROM arsip as a RIGHT JOIN jenis_arsip as b on a.jenisarsip_id=b.jenisarsip_id,ruang as c,spj_detail as d 
									WHERE a.ruang=c.ruang_id AND a.arsip_id=d.arsip_id AND (a.nama_arsip LIKE '%$keywords%' OR a.keyword LIKE '%$keywords%' OR c.nama_ruang LIKE '%$keywords%' OR d.uraian LIKE '%$keywords%' OR d.tanggal LIKE '%$keywords%')
									UNION
									SELECT a.arsip_id,a.jenisarsip_id,a.nama_arsip,a.keyword,c.nama_ruang,a.rak,a.baris,a.box,d.uraian,d.tanggal
									FROM arsip as a RIGHT JOIN jenis_arsip as b on a.jenisarsip_id=b.jenisarsip_id,ruang as c,lkpp_detail as d 
									WHERE a.ruang=c.ruang_id AND a.arsip_id=d.arsip_id AND (a.nama_arsip LIKE '%$keywords%' OR a.keyword LIKE '%$keywords%' OR c.nama_ruang LIKE '%$keywords%' OR d.uraian LIKE '%$keywords%' OR d.tanggal LIKE '%$keywords%')
								  ");
		$jml_data=$query->rowCount();
		if($jml_data>=1){
			$hasil=$query->fetchALL();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	function advanceSearch($keywords,$jenisarsip,$ruangarsip){
		
		$query=$this->db1->query("SELECT a.arsip_id,a.jenisarsip_id,b.nama_jenisarsip,a.nama_arsip,a.keyword,c.ruang_id,c.nama_ruang,a.rak,a.baris,a.box
									FROM arsip as a RIGHT JOIN jenis_arsip as b on a.jenisarsip_id=b.jenisarsip_id,ruang as c,suratmasuk_detail as d 
									WHERE a.ruang=c.ruang_id AND a.arsip_id=d.arsip_id AND a.nama_arsip LIKE '%$keywords%' AND a.jenisarsip_id='$jenisarsip' AND c.ruang_id='$ruangarsip'
									UNION
									SELECT a.arsip_id,a.jenisarsip_id,b.nama_jenisarsip,a.nama_arsip,a.keyword,c.ruang_id,c.nama_ruang,a.rak,a.baris,a.box
									FROM arsip as a RIGHT JOIN jenis_arsip as b on a.jenisarsip_id=b.jenisarsip_id,ruang as c,suratkeluar_detail as d 
									WHERE a.ruang=c.ruang_id AND a.arsip_id=d.arsip_id AND a.nama_arsip LIKE '%$keywords%' AND a.jenisarsip_id='$jenisarsip' AND c.ruang_id='$ruangarsip'
									UNION
									SELECT a.arsip_id,a.jenisarsip_id,b.nama_jenisarsip,a.nama_arsip,a.keyword,c.ruang_id,c.nama_ruang,a.rak,a.baris,a.box
									FROM arsip as a RIGHT JOIN jenis_arsip as b on a.jenisarsip_id=b.jenisarsip_id,ruang as c,sp2d_detail as d 
									WHERE a.ruang=c.ruang_id AND a.arsip_id=d.arsip_id AND a.nama_arsip LIKE '%$keywords%' AND a.jenisarsip_id='$jenisarsip' AND c.ruang_id='$ruangarsip'
									UNION
									SELECT a.arsip_id,a.jenisarsip_id,b.nama_jenisarsip,a.nama_arsip,a.keyword,c.ruang_id,c.nama_ruang,a.rak,a.baris,a.box
									FROM arsip as a RIGHT JOIN jenis_arsip as b on a.jenisarsip_id=b.jenisarsip_id,ruang as c,spj_detail as d 
									WHERE a.ruang=c.ruang_id AND a.arsip_id=d.arsip_id AND a.nama_arsip LIKE '%$keywords%' AND a.jenisarsip_id='$jenisarsip' AND c.ruang_id='$ruangarsip'
									UNION
									SELECT a.arsip_id,a.jenisarsip_id,b.nama_jenisarsip,a.nama_arsip,a.keyword,c.ruang_id,c.nama_ruang,a.rak,a.baris,a.box
									FROM arsip as a RIGHT JOIN jenis_arsip as b on a.jenisarsip_id=b.jenisarsip_id,ruang as c,lkpp_detail as d 
									WHERE a.ruang=c.ruang_id AND a.arsip_id=d.arsip_id AND a.nama_arsip LIKE '%$keywords%' AND a.jenisarsip_id='$jenisarsip' AND c.ruang_id='$ruangarsip'
									");
		$jml_data=$query->rowCount();
		if($jml_data>=1){
			$hasil=$query->fetchALL();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
}


?>