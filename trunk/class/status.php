<?php
/**
 * @author freaksmj
 */
include_once('../config/class.database.php');

class Status{

	public $db1;
	public $db2;
	
	function __construct(){
		$connect = new Database();
		$this->db1 = $connect->connectdb1();
		$this->db2 = $connect->connectdb2();
	}
	
	function getArsipaktif(){
	$query=$this->db1->query("SELECT a.arsip_id, a.jenisarsip_id, b.nama_jenisarsip, b.masa_retensi, a.nama_arsip, c.nama_ruang, a.rak, a.baris, a.box,d.tanggal as tgl, YEAR( NOW( ) ) - YEAR( d.tanggal ) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(d.tanggal, '%m%d')) as diff_years
							FROM arsip AS a
							RIGHT JOIN jenis_arsip AS b ON a.jenisarsip_id = b.jenisarsip_id, ruang AS c, suratmasuk_detail AS d 
							WHERE a.ruang = c.ruang_id 
							AND a.arsip_id=d.arsip_id 
							AND YEAR( NOW( ) ) - YEAR( d.tanggal ) <1
							UNION
							SELECT a.arsip_id, a.jenisarsip_id, b.nama_jenisarsip, b.masa_retensi, a.nama_arsip, c.nama_ruang, a.rak, a.baris, a.box,e.tanggal as tgl,YEAR( NOW( ) ) - YEAR( e.tanggal ) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(e.tanggal, '%m%d')) as diff_years
							FROM arsip AS a
							RIGHT JOIN jenis_arsip AS b ON a.jenisarsip_id = b.jenisarsip_id, ruang AS c, suratkeluar_detail AS e 
							WHERE a.ruang = c.ruang_id 
							AND a.arsip_id=e.arsip_id 
							AND YEAR( NOW( ) ) - YEAR( e.tanggal ) <1
							UNION
							SELECT a.arsip_id, a.jenisarsip_id, b.nama_jenisarsip, b.masa_retensi, a.nama_arsip, c.nama_ruang, a.rak, a.baris, a.box, f.tgsp2d as tgl,YEAR( NOW( ) ) - YEAR( f.tgsp2d ) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(f.tgsp2d, '%m%d')) as diff_years
							FROM arsip AS a
							RIGHT JOIN jenis_arsip AS b ON a.jenisarsip_id = b.jenisarsip_id, ruang AS c, sp2d_detail AS f 
							WHERE a.ruang = c.ruang_id 
							AND a.arsip_id=f.arsip_id 
							AND YEAR( NOW( ) ) - YEAR( f.tgsp2d ) <1
							UNION
							SELECT a.arsip_id, a.jenisarsip_id, b.nama_jenisarsip, b.masa_retensi, a.nama_arsip, c.nama_ruang, a.rak, a.baris, a.box, g.tanggal as tgl,YEAR( NOW( ) ) - YEAR( g.tanggal ) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(g.tanggal, '%m%d')) as diff_years
							FROM arsip AS a
							RIGHT JOIN jenis_arsip AS b ON a.jenisarsip_id = b.jenisarsip_id, ruang AS c, spj_detail AS g 
							WHERE a.ruang = c.ruang_id 
							AND a.arsip_id=g.arsip_id 
							AND YEAR( NOW( ) ) - YEAR( g.tanggal ) <1
							UNION
							SELECT a.arsip_id, a.jenisarsip_id, b.nama_jenisarsip, b.masa_retensi, a.nama_arsip, c.nama_ruang, a.rak, a.baris, a.box, h.tanggal as tgl,YEAR( NOW( ) ) - YEAR( h.tanggal ) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(h.tanggal, '%m%d')) as diff_years
							FROM arsip AS a
							RIGHT JOIN jenis_arsip AS b ON a.jenisarsip_id = b.jenisarsip_id, ruang AS c, lkpp_detail AS h 
							WHERE a.ruang = c.ruang_id 
							AND a.arsip_id=h.arsip_id 
							AND YEAR( NOW( ) ) - YEAR( h.tanggal ) <1
							");
	$jml_data=$query->rowCount();
		if($jml_data>=1){
			$hasil=$query->fetchAll();
			return $hasil;
		}else{
			return $jml_data;
		}	
	}
	
	function getArsipinaktif(){
	$query=$this->db1->query("SELECT a.arsip_id, a.jenisarsip_id, b.nama_jenisarsip, b.masa_retensi, a.nama_arsip, c.nama_ruang, a.rak, a.baris, a.box,d.tanggal as tgl,YEAR( NOW( ) ) - YEAR( d.tanggal ) -(DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(d.tanggal, '%m%d')) as diff_years
								FROM arsip AS a
								RIGHT JOIN jenis_arsip AS b ON a.jenisarsip_id = b.jenisarsip_id, ruang AS c, suratmasuk_detail AS d 
								WHERE a.ruang = c.ruang_id 
								AND a.arsip_id=d.arsip_id 
								AND YEAR( NOW( ) ) - YEAR( d.tanggal ) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(d.tanggal, '%m%d')) BETWEEN '1' AND b.masa_retensi
								UNION
								SELECT a.arsip_id, a.jenisarsip_id, b.nama_jenisarsip, b.masa_retensi, a.nama_arsip, c.nama_ruang, a.rak, a.baris, a.box,e.tanggal as tgl,YEAR( NOW( ) ) - YEAR( e.tanggal ) -(DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(e.tanggal, '%m%d')) as diff_years
								FROM arsip AS a
								RIGHT JOIN jenis_arsip AS b ON a.jenisarsip_id = b.jenisarsip_id, ruang AS c, suratkeluar_detail AS e 
								WHERE a.ruang = c.ruang_id 
								AND a.arsip_id=e.arsip_id 
								AND YEAR( NOW( ) ) - YEAR( e.tanggal ) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(e.tanggal, '%m%d')) BETWEEN '1' AND b.masa_retensi
								UNION
								SELECT a.arsip_id, a.jenisarsip_id, b.nama_jenisarsip, b.masa_retensi, a.nama_arsip, c.nama_ruang, a.rak, a.baris, a.box,f.tgsp2d as tgl,YEAR( NOW( ) ) - YEAR( f.tgsp2d ) -(DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(f.tgsp2d, '%m%d')) as diff_years
								FROM arsip AS a
								RIGHT JOIN jenis_arsip AS b ON a.jenisarsip_id = b.jenisarsip_id, ruang AS c, sp2d_detail AS f 
								WHERE a.ruang = c.ruang_id 
								AND a.arsip_id=f.arsip_id 
								AND YEAR( NOW( ) ) - YEAR( f.tgsp2d ) -(DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(f.tgsp2d, '%m%d')) BETWEEN '1' AND b.masa_retensi
								UNION
								SELECT a.arsip_id, a.jenisarsip_id, b.nama_jenisarsip, b.masa_retensi, a.nama_arsip, c.nama_ruang, a.rak, a.baris, a.box,g.tanggal as tgl,YEAR( NOW( ) ) - YEAR( g.tanggal ) -(DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(g.tanggal, '%m%d')) as diff_years
								FROM arsip AS a
								RIGHT JOIN jenis_arsip AS b ON a.jenisarsip_id = b.jenisarsip_id, ruang AS c, spj_detail AS g 
								WHERE a.ruang = c.ruang_id 
								AND a.arsip_id=g.arsip_id 
								AND YEAR( NOW( ) ) - YEAR( g.tanggal ) -(DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(g.tanggal, '%m%d')) BETWEEN '1' AND b.masa_retensi
								UNION
								SELECT a.arsip_id, a.jenisarsip_id, b.nama_jenisarsip, b.masa_retensi, a.nama_arsip, c.nama_ruang, a.rak, a.baris, a.box,h.tanggal as tgl,YEAR( NOW( ) ) - YEAR( h.tanggal ) -(DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(h.tanggal, '%m%d')) as diff_years
								FROM arsip AS a
								RIGHT JOIN jenis_arsip AS b ON a.jenisarsip_id = b.jenisarsip_id, ruang AS c, lkpp_detail AS h 
								WHERE a.ruang = c.ruang_id 
								AND a.arsip_id=h.arsip_id 
								AND YEAR( NOW( ) ) - YEAR( h.tanggal ) -(DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(h.tanggal, '%m%d')) BETWEEN '1' AND b.masa_retensi
								");
	$jml_data=$query->rowCount();
		if($jml_data>=1){
			$hasil=$query->fetchAll();
			return $hasil;
		}else{
			return $jml_data;
		}	
	}

	function getStatusmusnah(){
	$query=$this->db1->query("SELECT a.arsip_id, a.jenisarsip_id, b.nama_jenisarsip, b.masa_retensi, a.nama_arsip, c.nama_ruang, a.rak, a.baris, a.box,d.tanggal as tgl,YEAR( NOW( ) ) - YEAR( d.tanggal ) -(DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(d.tanggal, '%m%d')) as diff_years
								FROM arsip AS a
								RIGHT JOIN jenis_arsip AS b ON a.jenisarsip_id = b.jenisarsip_id, ruang AS c, suratmasuk_detail AS d 
								WHERE a.ruang = c.ruang_id 
								AND a.arsip_id=d.arsip_id 
								AND YEAR( NOW( ) ) - YEAR( d.tanggal ) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(d.tanggal, '%m%d')) > b.masa_retensi
								UNION
								SELECT a.arsip_id, a.jenisarsip_id, b.nama_jenisarsip, b.masa_retensi, a.nama_arsip, c.nama_ruang, a.rak, a.baris, a.box,e.tanggal as tgl,YEAR( NOW( ) ) - YEAR( e.tanggal ) -(DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(e.tanggal, '%m%d')) as diff_years
								FROM arsip AS a
								RIGHT JOIN jenis_arsip AS b ON a.jenisarsip_id = b.jenisarsip_id, ruang AS c, suratkeluar_detail AS e 
								WHERE a.ruang = c.ruang_id 
								AND a.arsip_id=e.arsip_id 
								AND YEAR( NOW( ) ) - YEAR( e.tanggal ) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(e.tanggal, '%m%d')) > b.masa_retensi
								UNION
								SELECT a.arsip_id, a.jenisarsip_id, b.nama_jenisarsip, b.masa_retensi, a.nama_arsip, c.nama_ruang, a.rak, a.baris, a.box,f.tgsp2d as tgl,YEAR( NOW( ) ) - YEAR( f.tgsp2d ) -(DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(f.tgsp2d, '%m%d')) as diff_years
								FROM arsip AS a
								RIGHT JOIN jenis_arsip AS b ON a.jenisarsip_id = b.jenisarsip_id, ruang AS c, sp2d_detail AS f 
								WHERE a.ruang = c.ruang_id 
								AND a.arsip_id=f.arsip_id 
								AND YEAR( NOW( ) ) - YEAR( f.tgsp2d ) -(DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(f.tgsp2d, '%m%d')) > b.masa_retensi
								UNION
								SELECT a.arsip_id, a.jenisarsip_id, b.nama_jenisarsip, b.masa_retensi, a.nama_arsip, c.nama_ruang, a.rak, a.baris, a.box,g.tanggal as tgl,YEAR( NOW( ) ) - YEAR( g.tanggal ) -(DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(g.tanggal, '%m%d')) as diff_years
								FROM arsip AS a
								RIGHT JOIN jenis_arsip AS b ON a.jenisarsip_id = b.jenisarsip_id, ruang AS c, spj_detail AS g 
								WHERE a.ruang = c.ruang_id 
								AND a.arsip_id=g.arsip_id 
								AND YEAR( NOW( ) ) - YEAR( g.tanggal ) -(DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(g.tanggal, '%m%d')) > b.masa_retensi
								UNION
								SELECT a.arsip_id, a.jenisarsip_id, b.nama_jenisarsip, b.masa_retensi, a.nama_arsip, c.nama_ruang, a.rak, a.baris, a.box,h.tanggal as tgl,YEAR( NOW( ) ) - YEAR( h.tanggal ) -(DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(h.tanggal, '%m%d')) as diff_years
								FROM arsip AS a
								RIGHT JOIN jenis_arsip AS b ON a.jenisarsip_id = b.jenisarsip_id, ruang AS c, lkpp_detail AS h 
								WHERE a.ruang = c.ruang_id 
								AND a.arsip_id=h.arsip_id 
								AND YEAR( NOW( ) ) - YEAR( h.tanggal ) -(DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(h.tanggal, '%m%d')) > b.masa_retensi
								");
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