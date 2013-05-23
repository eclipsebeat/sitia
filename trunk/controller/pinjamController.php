<?php
/**
 * @author freaksmj
 */
 
	include_once('../class/arsip.php');
	include_once('../class/pinjam.php');
	
	//view all arsip
	$arsip = new Arsip();
	$all=$arsip->getAllarsip(null);
	

		

?>