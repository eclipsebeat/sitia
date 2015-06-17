<!DOCTYPE html>
<html>
 <head>
    <title>Login</title>
    <!-- Bootstrap -->
	{{HTML::style('assets/css/bootstrap.css')}}
	{{HTML::style('assets/css/app_tes.css')}}
 </head>
 <body>	
 <div class="row">
    <div class="col-md-8 col-md-offset-2 well">
	<div class="row" style="padding-left:15px;padding-right:15px">
    <div id="legend" class="well">
	  <h1><img alt="" src="{{URL::to('assets/img/document-icon.png')}}" />Sistem Informasi Arsip</h1>
    </div>
	</div>
	<hr>
    <div class="row" style="padding-left:15px">
    <div class="col-md-6 well">
	<p><br>
	<b>Selamat datang di halaman login<br>
	Hanya staff terdaftar yang diperkenankan menggunakan sistem informasi ini.<br>
	Silahkan hubungi Administrator untuk mendapatkan user dan password.</b></p>
	</div>

    <div class="col-md-6"> 
	<div class="well">
	    <legend><img alt="" src="{{URL::to('assets/img/App-login-manager-icon.png')}}" /><b>Login</b></legend>
		{{Form::open(array('url'=>'login'))}}
			<div>
			<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			{{Form::text('username','',array('class'=>'form-control','placeholder'=>'Username'))}}
			</div>
			</div>
            <!-- Password-->
			<div style="margin-top:4px">
			<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			{{Form::password('password',array('class'=>'form-control'))}}
            </div>
			</div>
			<div class="checkbox">
			<label>
				{{Form::checkbox('remember','Remember me',true)}} Remember me
			</label>
            </div>
			{{Form::submit('Login',array('class'=>'btn-info btn','name'=>'login'))}}
        {{Form::close()}}
	</div>
    </div>
    </div>
	<hr>
  <div class="row">
  	<p><center><b>&copy 2015 Kanwil DJP Sumbar Jambi</b></center></p>
    </div>
  </div>
  </div>
</body>  
</html>