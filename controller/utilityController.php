<?php
/**
 * @author freaksmj
 */
 
	include_once('../config/class.database.php');
	include_once('../class/utility.php');
	
	$util	= new Utility();

	$connect = new Database();
	$connect->connectUtil();
	$database	=$connect->db_sitia;
	$file		=$database.'_'.date("DdMY").'_'.time().'.sql';
	$back_dir	='../backup/';


	//Download file backup ============================================
	if(isset($_GET['nama_file'])){
		$file = $back_dir.$_GET['nama_file'];
		
		if (file_exists($file)){

			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($file));
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: private');
			header('Pragma: private');
			header('Content-Length: ' . filesize($file));
			ob_clean();
			flush();
			readfile($file);
			exit;

		} else {
			echo "file {$_GET['nama_file']} sudah tidak ada.";
		}
		
	}

	//Backup database =================================================
	if(isset($_POST['backup'])){
		$backup=$util->backup($file);
		$success_backup= 'Backup database sukses <br> File dapat di download <a style="cursor:pointer" href="?nama_file='.$file.'" title="Download">Disini</a>';
		
	} else {
		unset($_POST['backup']);
	}

	//Restore database ================================================
	if(isset($_POST['restore'])){
		$restore=$util->restore($_FILES['datafile']);
		$success_restore='Restore Database Berhasil';
	} else {
		unset($_POST['restore']);
	}



?>