<?php
/**
 * @author freaksmj
 */       
		
	if(!isset($_SESSION['login'])){
            session_start();
        }
		if(isset($_SESSION['login'])){
            $session_name=$_SESSION['login'];
    }else{
           header("location: index.php");
    }
?>