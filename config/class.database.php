<?php
/**
 * @author freaksmj
 */

class Database {

	public $dbh_sitia;
	public $host_sitia	="localhost";
	public $user_sitia	="root";
	public $pass_sitia	="";
	public $db_sitia	="sitia";
	
	public $dbh_sp2d;
	public $host_sp2d	="localhost:3355";
	public $user_sp2d	="administrator";
	public $pass_sp2d 	="A02AE24A8CC3A3B233C3456EAB5D85631720572DE5C3E45A30C70833A855A993administrator";
	public $db_sp2d		="sqldb12";
		
	public function connectdb1(){
		try{
			$this->dbh_sitia = new PDO("mysql:host=$this->host_sitia;dbname=$this->db_sitia",$this->user_sitia,$this->pass_sitia);
			return $this->dbh_sitia;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
	
	public function connectdb2(){
		try{
			$this->dbh_sp2d = new PDO("mysql:host=$this->host_sp2d;dbname=$this->db_sp2d",$this->user_sp2d,$this->pass_sp2d);
			return $this->dbh_sp2d;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
	
	
	public function connectUtil(){
        $link = mysql_connect($this->host_sitia,$this->user_sitia, $this->pass_sitia);
        mysql_select_db($this->db_sitia, $link) or die( "MySQL Gagal Koneksi" );

    }
	
}
?>