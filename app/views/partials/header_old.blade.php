<div class='container'></div>
  <nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				 <a href="../" class="navbar-brand">SITIA</a>
			</div>
			@if (Auth::check())
			<ul class="nav navbar-nav">					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">RUH Arsip<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('/arsip') }}">Daftar Arsip</a></li>
							<li><a href="{{ url('/arsip/rekam') }}">Rekam Arsip</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Utility<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('/user') }}">RUH User</a></li>
							<li><a href="{{ url('/Utility') }}">RUH Lokasi Arsip</a></li>
							<li><a href="{{ url('/Utility') }}">RUH Jenis Arsip</a></li>
							<li><a href="{{ url('/auth/logout') }}">Backup dan Restore</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<form class="navbar-form navbar-left" role="search">
				        <div class="form-group">
				          <input type="text" class="form-control" placeholder="Search">
				        </div>
				        <button type="submit" class="btn btn-default">Submit</button>
				    </form>
					<p class="navbar-text">Selamat Datang {{ Auth::user()->username }}</p>
					<li>{{ HTML::link('logout', 'logout') }}</li>
				</ul>
				@endif			
		</div>
	</nav>
</div>