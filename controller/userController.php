<?php
/**
 * @author freaksmj
 */
include_once('../class/user.php');
	
	$user= new User();
	$all=$user->getAllUser();
	
	if(isset($_POST['login'])){
		session_start();
		$user= new User();
		$username  =$_POST['username'];
		$password  =$_POST['password'];
		
		if(empty($username) || empty ($password)){
			$error_login="Username dan Password harus diisi";
			session_destroy();
		}else{
			$cek=$user->loginUser($username,$password);
			if($cek==1){
				$session = $user->getUser($username);
				foreach($session as $userSession){
					$_SESSION['login']=$userSession['user_id'];
					$_SESSION['level']=$userSession['role'];
					if(isset($_SESSION['login'])){
						$_SESSION['username']=$userSession['username'];
						$_SESSION['user_id']=$userSession['user_id'];
						header("location:index.php");
					}		
				}
			}else{
				$error_login="Login gagal, username atau password salah";
				session_destroy();
			}	
		}		
	}
	
	if(isset($_POST['daftar'])){

		$user= new User();
		$username  =$_POST['username'];
		$password  =$_POST['password'];
		$password2 =$_POST['password2'];
		$NIP	   =$_POST['NIP'];
		$role	   =$_POST['role'];
		
		if(empty($username) || empty ($password) || empty ($NIP) || empty($role)){
			$error_daftar="Semua Field Harus diisi";

		}elseif($password !== $password2){
			$error_daftar="Verifikasi password berbeda";

		}elseif(!preg_match('/^\d{19}$/', $NIP)){
			$error_daftar="NIP terdiri dari 19 karakter numerik saja";

		}else{
			$cek=$user->getUser($username);
			if($cek==0){
				$daftar=$user->addUser($username,$password,$NIP,$role);
				if ($daftar == 1){
					$session = $user->getUser($username);
					$success="User berhasil di rekam";
					header("refresh: 3;user.php");
				}
			}else{
				$error_daftar="Username <b>".$username."</b> sudah terdaftar";
			}
		}		
	}
	
	if(isset($_POST['update'])){
		$user= new User();
		$id		   =$_POST['id_ubah'];
		$username  =$_POST['username'];
		$password  =$_POST['password'];
		$password2 =$_POST['password2'];
		$NIP	   =$_POST['NIP'];
		$role	   =$_POST['role'];
		
		if(empty($username) || empty ($password) || empty ($NIP) || empty($role)){
			$error_daftar="Semua field harus diisi";

		}elseif($password !== $password2){
			$error_daftar="Verifikasi password berbeda";
			
		}elseif(!preg_match('/^\d{19}$/', $NIP)){
			$error_daftar="NIP terdiri dari 19 karakter numerik saja";
			
		}else{
			$daftar=$user->updateUser($id,$username,$password,$NIP,$role);
			if ($daftar == 1){
				$success="Data User Berhasil Di Ubah";
				header("refresh: 3;user.php");					
			}else{
				$error_daftar="Gagal Mengubah Data User";
			}
		}		
	}
	
	if (isset($_GET['delete'])){
		$user = new User();
		$id=$_GET['delete'];
		
		$hapus=$user->deleteUser($id);
		if($hapus==1){
			$success="User berhasil di hapus";
			header("location:user.php");
		}else{
			$error_delete="User gagal di hapus";
		}
	}
	
	if (isset($_GET['id'])){
		$user = new User();
		$id=$_GET['id'];
		
		$ubah=$user->getUserdetail($id);
	}
	
?>