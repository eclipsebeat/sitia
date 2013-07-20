<?php
/**
 * @author freaksmj
 */
include_once('../config/class.database.php');

class User{

	public $db1;
	public $db2;
	
	function __construct(){
		$connect = new Database();
		$this->db1 = $connect->connectdb1();
		//$connect2 = new Database();
		//$this->db2 = $connect->connectdb2();
	}
	
	function addUser($username, $password, $NIP, $role){
		$input_date=date("Y-m-d");
		$last_update=date("Y-m-d");
		$password_md5=md5($password);
		$query=$this->db1->prepare("INSERT INTO users(username,password,NIP,role,input_date,last_update) VALUES (?,?,?,?,?,?)");
		$data=array($username,$password_md5,$NIP,$role,$input_date,$last_update);
		$query->execute($data);
		$jml_data=$query->rowCount();
		return $jml_data;
	}
	
	function getUser($username){
		$query=$this->db1->query("SELECT*FROM users WHERE username='$username'");
		$jml_data=$query->rowCount();
		if($jml_data==1){
			$hasil=$query->fetchALL();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	function getUserdetail($id){
		$query=$this->db1->query("SELECT*FROM users WHERE user_id='$id'");
		$jml_data=$query->rowCount();
		if($jml_data==1){
			$hasil=$query->fetchALL();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	function getAllUser(){
		$query=$this->db1->query("SELECT a.user_id,a.username,a.password,a.NIP,a.role,b.category,a.input_date,a.last_update FROM users as a RIGHT JOIN user_categories as b ON a.role=b.usercat_id ORDER BY role");
		$jml_data=$query->rowCount();
		if($jml_data>=1){
			$hasil=$query->fetchAll();
			return $hasil;
		}else{
			return $jml_data;
		}
	}
	
	function loginUser($username,$password){
		$password_md5=md5($password); 
		$query=$this->db1->query("SELECT*FROM users WHERE username='$username' AND password='$password_md5'");
		$hasil=$query->rowCount();
		return $hasil;
	}
	
	function deleteUser($id){
		$query=$this->db1->query("DELETE FROM users WHERE user_id='$id'");
		$jml_data=$query->rowCount();
		return $jml_data;
	}
	
	function updateUser($id,$username, $password, $NIP, $role){
		$last_update=date("Y-m-d");
		$password_md5=md5($password);
		$query=$this->db1->query("UPDATE users SET username='$username',password='$password_md5',NIP='$NIP',role='$role',last_update='$last_update' WHERE user_id='$id'");
		$jml_data=$query->rowCount();
		return $jml_data;
	}
	
}
?>