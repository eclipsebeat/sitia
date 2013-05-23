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
	<link rel="stylesheet" href="../includes/css/application.css">
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
    <div class="span8 offset2 well-large">
    <div id="legend">
	  <h1><img alt="" src="../includes/img/document-icon.png" />Sistem Informasi Arsip</h1>
    </div>
	<hr>
    <div class="row">
    <div class="span4">
	<p><br>
	<b>Selamat datang di halaman login<br>
	Hanya staff terdaftar yang diperkenankan menggunakan sistem informasi ini.<br>
	Silahkan hubungi Administrator untuk mendapatkan user dan password.</b></p>
	</div>

    <div id="login form" class="span4">
	<div class="well">
	    <legend><img alt="" src="../includes/img/App-login-manager-icon.png" />Login</legend>
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
  	<p><center>&copy 2013 by FreaksMJ</center></p>
    </div>
  </div>
  </div>
<?php
}
?> 
</body>  
</html>