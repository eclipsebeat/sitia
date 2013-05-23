<?php
/**
 * @author freaksmj
 */
include_once('../controller/sessionController.php');
?>
<!DOCTYPE html>
<html>
 <head>
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="../includes/css/bootstrap.css">
	<link rel="stylesheet" href="../includes/css/application.css">
	
	<script type="text/javascript" src="../includes/js/bootstrap.js"></script>
	<script type="text/javascript" src="../includes/js/jquery.js"></script>
	<script type="text/javascript" src="../includes/js/bootstrap-dropdown.js"></script>
  
 </head>
 <body>
 
 <div id="wrapper">
 
 <div id="masthead">
	
	<div class="container">
		
		<div class="masthead-pad">
			
			<div class="masthead-text">
				<h1><img alt="" src="../includes/img/depkeu_Logo.png" />   Sistem Informasi Arsip </h1>
				</div> <!-- /.masthead-text -->
			
		</div>
		
	</div> <!-- /.container -->	
	
</div> <!-- /#masthead -->

<div id="topbar">
	
	<div class="container">
	<div id="top-nav">
<ul class>
<?php
	$my_t=getdate(date("U"));
	echo "<li>$my_t[weekday], $my_t[mday] - $my_t[month] - $my_t[year]</a>";
?>
</ul>			
			<ul class="pull-right">
				<li>Anda Login Sebagai : <i class="icon-user icon-white"></i>
				<?php
				if(isset($_SESSION['login'])){
					echo " ".$_SESSION['username']." ";
					//echo " ".$_SESSION['login']." ";
				}
				?> 
				</li>

				<li><a href="logout.php">Logout</a></li>
			</ul>
			
		</div> <!-- /#top-nav -->
		
	</div> <!-- /.container -->
	
</div> <!-- /#topbar -->

</body>
</html>