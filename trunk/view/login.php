<?php
/**
 * @author freaksmj
 */
	include_once('../controller/userController.php');
?>
<!DOCTYPE html>
<html>
 <head>
    <title>Login</title>
    <!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="../includes/css/bootstrap.css">
	<link type="text/css" rel="stylesheet" href="../includes/css/application_login.css">
	<link type="text/css" rel="stylesheet" href="../includes/datepicker/css/datepicker.css">
	<link type="text/css" rel="stylesheet" href="../includes/DT/css/DT_bootstrap.css">
	
	<script type="text/javascript" src="../includes/js/bootstrap.js"></script>
	<script type="text/javascript" src="../includes/js/jquery.js"></script>
	<script type="text/javascript" src="../includes/js/bootstrap-dropdown.js"></script>
	<script type="text/javascript" src="../includes/datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="../includes/js/bootstrap-modal.js"></script>
	<script type="text/javascript" src="../includes/DT/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="../includes/DT/js/DT_bootstrap.js"></script>
 </head>
 <body>
<?php
	if(!isset($_SESSION['login'])){
		session_start();
	}
	if(isset($_SESSION['login'])){
		
	}else{

?> 	
 <div class="row">
    <div class="span8 offset2 well">
    <div id="legend" class="well-large">
	  <h1><img alt="" src="../includes/img/document-icon.png" />Sistem Informasi Arsip</h1>
    </div>
	<hr>
    <div class="row">
    <div class="span3 well-large">
	<p><br>
	<b>Selamat datang di halaman login<br>
	Hanya staff terdaftar yang diperkenankan menggunakan sistem informasi ini.<br>
	Silahkan hubungi Administrator untuk mendapatkan user dan password.</b></p>
	</div>

    <div id="login form" class="span4">
	<div class="well">
	    <legend><img alt="" src="../includes/img/App-login-manager-icon.png" /><b>Login</b></legend>
        <form method="post" action="#" accept-charset="UTF-8">
            <!--
			<div class="alert alert-error">
                <a class="close" data-dismiss="alert" href="#">x</a>Incorrect Username or Password!
            </div> -->
<?php
	if(isset($error_login)){
		echo '<div class="alert alert-error" id "alert">'.$error_login.'
			  <button type="button" class="close" data-dismiss="alert" id="close">x</button>
			  </div>';
}
?> 
			<!-- Username -->
			<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
            <input class="span3" placeholder="Username" type="text" name="username">
			</div>
            <!-- Password-->
			<div class="input-prepend"><span class="add-on"><i class="icon-lock"></i></span>
			<input class="span3" placeholder="Password" type="password" name="password"> 
            </div>
			<!--
			<label class="checkbox">
                <input type="checkbox" name="remember" value="1"> Remember Me
            </label> -->
            <button class="btn-info btn" type="submit" name="login">Login</button>      
        </form> 
	</div>
    </div>
    </div>
	<hr>
  <div class="row">
  	<p><center><b>&copy 2013 by FreaksMJ</b></center></p>
    </div>
  </div>
  </div>
<?php
}
?> 
</body>  
</html>