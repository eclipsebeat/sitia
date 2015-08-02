
{{-- VIEW --}}
<nav class="navbar navbar-default hidden">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{URL::to('/')}}">SITIA</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        {{--<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>--}}
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">RUH Arsip <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Surat Masuk</a></li>
            <li><a href="#">Surat Keluar</a></li>
            <li><a href="#">SPT Masa</a></li>
            <li><a href="#">Surat Ketetapan</a></li>
            <li><a href="#">Identitas Wajib Pajak</a></li>
			<li><a href="#">Arsip Lainnya</a></li>
          </ul>
        </li>
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Peminjaman Arsip <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Peminjaman Arsip</a></li>
            <li><a href="#">Pengembalian Arsip</a></li>
          </ul>
        </li>
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pencarian Arsip <span class="caret"></span></a>
        </li>
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Laporan <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Peminjaman Arsip</a></li>
            <li><a href="#">Status Arsip</a></li>
          </ul>
        </li>
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
			<li><a href="{{URL::to('user')}}">RUH User</a></li>
            <li><a href="#">Daftar Jenis Arsip</a></li>
            <li><a href="#">RUH Lokasi</a></li>
			<li><a href="#">Utility</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">{{Auth::user()->username}}</a></li>
        <li><a href="#">logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

 <div id="masthead">
	
	<div class="container">
		
		<div class="masthead-pad">
			
			<div class="masthead-text">
				<h1><img alt="" src="{{URL::to('assets/img/depkeu_Logo.png')}}" />   Sistem Informasi Arsip </h1>
				</div> <!-- /.masthead-text -->
			
		</div>
		
	</div> <!-- /.container -->	
	
</div> <!-- /#masthead -->

<div id="topbar">
	
	<div class="container">
	<div id="top-nav">
			<ul class="size-24">
			<?php
				$my_t=getdate(date("U"));
				echo "<li>$my_t[weekday], $my_t[mday] - $my_t[month] - $my_t[year]</a>";
			?>
			</ul>			
			<ul class="pull-right">
				<li class="size-24">Anda Login Sebagai : <i class="glyphicon glyphicon-user"></i> {{Auth::user()->username}}
					
				<li>
					<font id="blink">
					<a class="btn btn-small btn-danger" href="{{URL::to('/')}}">
					<i class="icon-envelope icon-white"></i>
					5 </a></font>
				 <li>
				
				</li>

				<li class="size-32"><a href="{{URL::to('logout')}}">Logout</a></li>
			</ul>
			
		</div> <!-- /#top-nav -->
		
	</div> <!-- /.container -->
	
</div> <!-- /#topbar -->
<?php $aktif = 'home'; ?>
<div id="header">
	
	<div class="container">
		
		<a href="index.php" class="brand">Dashboard Admin</a>
		
		<div class="nav-collapse">
			<ul id="main-nav" class="nav pull-right">
				<li <?php if($aktif=='home') { echo "class=active"; } ?>>
					<a href="{{URL::to('/')}}">
						<i class="glyphicon glyphicon-home"></i>
						<span>Home</span>        					
					</a>
				</li>
				<li class="dropdown <?php if($aktif=='arsip') { echo "active"; } ?>">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-file"></i>
						<span>RUH Arsip</span> 
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">
						<li class="dropdown-submenu">
						<a tabindex="-1" href="#">Surat Masuk</a>
							<ul class="dropdown-menu">
							<li><a href="suratmasuk.php">Daftar Surat Masuk</a></li>							
							<li><a href="suratmasuk.php?modul=tambah">Rekam Surat Masuk</a></li>							
							</ul>
						</li>
						<li class="dropdown-submenu">
						<a tabindex="-1" href="#">Surat Keluar</a>
							<ul class="dropdown-menu">
							<li><a href="suratkeluar.php">Daftar Surat Keluar</a></li>							
							<li><a href="suratkeluar.php?modul=tambah">Rekam Surat Keluar</a></li>							
							</ul>
						</li>
						<li class="dropdown-submenu">
						<a tabindex="-1" href="#">SPT Masa</a>
							<ul class="dropdown-menu">
							<li><a href="spt.php">Daftar SPT Masa</a></li>							
							<li><a href="spt.php?modul=load_spt">Load SPT Masa</a></li>
							<li><a href="spt.php?modul=view_spt">Rekam SPT Masa</a></li>							
							</ul>
						</li>
						<li class="dropdown-submenu">
						<a tabindex="-1" href="#">Surat Ketetapan</a>
							<ul class="dropdown-menu">
							<li><a href="skp.php">Daftar Surat Ketetapan</a></li>							
							<li><a href="skp.php?modul=tambah">Rekam Surat Ketetapan</a></li>							
							</ul>
						</li>
						<li class="dropdown-submenu">
						<a tabindex="-1" href="#">Identitas Wajib Pajak</a>
							<ul class="dropdown-menu">
							<li><a href="iwp.php">Daftar Identitas Wajib Pajak</a></li>							
							<li><a href="iwp.php?modul=tambah">Rekam Identitas Wajib Pajak</a></li>							
							</ul>
						</li>
						<li class="dropdown-submenu">
						<a tabindex="-1" href="#">Arsip Lainnya</a>
							<ul class="dropdown-menu">
							<li><a href="lain.php">Daftar Arsip Lainnya</a></li>							
							<li><a href="lain.php?modul=tambah">Rekam Arsip Lainnya</a></li>							
							</ul>
						</li>
					</ul> 				
				</li>
				
				<li class="dropdown <?php if($aktif=='pinjam') { echo "active"; } ?>">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-briefcase"></i>
						<span>Peminjaman Arsip</span> 
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">							
						<li><a href="pinjam.php">Peminjaman Arsip</a></li>
						<li><a href="pinjam.php?modul=kembali">Pengembalian Arsip</a></li>
					</ul>     				
				</li>
				
				<li class="dropdown <?php if($aktif=='cari') { echo "active"; } ?>">					
					<a href="search.php">
						<i class="glyphicon glyphicon-search"></i>
						<span>Pencarian Arsip</span> 
						<b class="caret"></b>
					</a>	
				</li>
				
				<li class="dropdown <?php if($aktif=='laporan') { echo "active"; } ?>">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-tasks"></i>
						<span>Laporan</span> 
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">
						<li><a href="laporan.php">Peminjaman Arsip</a></li>
						<li class="dropdown-submenu">
							<a tabindex="-1" href="#">Status Arsip</a>
							<ul class="dropdown-menu">
							<li><a href="laporan.php?modul=arsipAktif">Arsip Aktif</a></li>
							<li><a href="laporan.php?modul=arsipInAktif">Arsip Inaktif</a></li>
							<li><a href="laporan.php?modul=arsipMusnah">Arsip Musnah</a></li>
							</ul>
						</li>
					</ul>   				
				</li>
				<li class="dropdown <?php if($aktif=='admin') { echo "active"; } ?>">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-th"></i>
						<span>Admin</span> 
						<b class="caret"></b>
					</a>	
					<ul class="dropdown-menu">
						<li class="dropdown-submenu">
							<a tabindex="-1" href="{{URL::to('user')}}">RUH User</a>
							<ul class="dropdown-menu">
							<li><a href="user.php?">Daftar User</a></li>
							<li><a href="user.php?modul=tambah">Rekam User</a></li>
							</ul>
						</li>
						<li class="dropdown-submenu">
							<a tabindex="-1" href="{{URL::to('jenisarsip')}}">Daftar Jenis Arsip</a>
							<ul class="dropdown-menu">
							<li><a href="jenisarsip.php">Daftar Jenis Arsip</a></li>
							 <li><a href="jenisarsip.php?modul=tambah">Rekam Jenis Arsip</a></li> 
							</ul>
						</li>
						<li class="dropdown-submenu">
							<a tabindex="-1" href="{{URL::to('lokasi')}}">RUH Lokasi</a>
							<ul class="dropdown-menu">
							<li><a href="ruang.php">Daftar Lokasi</a></li>
							<li><a href="ruang.php?modul=tambah">Rekam Lokasi</a></li>
							</ul>
						</li>
						<li class="dropdown-submenu">
							<a tabindex="-1" href="utility.php">Utility</a>
						</li>
					</ul>
				</li>
				
			</ul>
			
		</div> <!-- /.nav-collapse -->

	</div> <!-- /.container -->
	
</div> <!-- /#header -->
<div id="masthead">
	
	<div class="container">
		
		<div class="masthead-pad">
			
			<div class="masthead-text">
				<h2>{{$title}}</h2>
				<p>{{$description}}</p>
			</div> <!-- /.masthead-text -->
			
		</div>
		
	</div> <!-- /.container -->	
	
</div> <!-- /#masthead -->
<div id="content">
<div class="container">
{{-- END OF VIEW --}}