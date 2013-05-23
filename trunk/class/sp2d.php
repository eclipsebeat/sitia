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
		$query1=$this->db1->query("SELECT nosp2d FROM sp2d_detail");
		$sp2d1=$query1->fetchAll();
		//var_dump($sp2d1);
		$query2=$this->db2->query("SELECT a.nosp2d, a.tgsp2d, a.kdsatker, b.totnilmak-b.totnilmap AS nilaisp2d, CONCAT(a.uraiben1,a.uraiben2) AS uraiben, CONCAT(a.untuk1,a.untuk2,a.untuk3,a.untuk4,a.untuk5,a.untuk6,a.untuk7,a.untuk8) AS untuk FROM m_spminfo AS a RIGHT JOIN m_spmind AS b ON a.nosp2d=b.nosp2d where a.tgsp2d='$date' ORDER BY nosp2d ASC");
		$sp2d2=$query2->fetchAll();
		//var_dump($sp2d2);
		$jml_data=$query2->rowCount();
		if($jml_data>=1){
			$hasil[]='';
			$i=0;
			foreach($sp2d2 as $rows){
				if(!in_array($rows['nosp2d'],$sp2d1)){//filternya lom jln, sp2d g sudah terekam masih terlihat
				//var_dump($rows['nosp2d']);
					$hasil[$i]=$sp2d2[$i];
					$i++;
				}
			}
			return $hasil;
		}else{
			return $jml_data;
		}
		/*$query=$this->db2->query("SELECT a.nosp2d, a.tgsp2d, a.kdsatker, b.totnilmak-b.totnilmap AS nilaisp2d, CONCAT(a.uraiben1,a.uraiben2) AS uraiben, CONCAT(a.untuk1,a.untuk2,a.untuk3,a.untuk4,a.untuk5,a.untuk6,a.untuk7,a.untuk8) AS untuk FROM m_spminfo AS a RIGHT JOIN m_spmind AS b ON a.nosp2d=b.nosp2d where a.tgsp2d='$date'");
		$jml_data=$query->rowCount();
		if($jml_data>=1){
			$hasil=$query->fetchAll();
			return $hasil;
		}else{
			return $jml_data;
		}*/
	}
	
	function getSp2d($id){
		$query=$this->db1->query("SELECT a.arsip_id,a.nama_arsip,c.nama_ruang,a.rak,a.baris,a.box,a.keyword,b.nosp2d,b.tgsp2d,b.kdsatker,b.nilaisp2d,b.uraiben,b.untuk,b.attachment FROM arsip as a RIGHT JOIN  sp2d_detail as b on a.arsip_id=b.arsip_id, ruang as c WHERE  a.ruang=c.ruang_id AND a.arsip_id='$id'");
		$jml_data=$query->rowCount();
		if($jml_data==1){
			$hasil=$query->fetchALL();
			return $hasil;
		}else{
			return $jml_data;
		}
		
	}

}
?>