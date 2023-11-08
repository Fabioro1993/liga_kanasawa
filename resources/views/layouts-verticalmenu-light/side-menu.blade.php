<!-- Sidemenu -->
<div class="main-sidebar main-sidebar-sticky side-menu">
	<div class="sidemenu-logo">
		<a class="main-logo" href="{{url('competition')}}">
			<img src="{{URL::asset('images/logo_liga.jpeg')}}" class="header-brand-img desktop-logo" alt="logo" style="width: 115px; height: 36px">

			{{-- <img src="{{URL::asset('assets/img/brand/logo-light.png')}}" class="header-brand-img desktop-logo" alt="logo">
			<img src="{{URL::asset('assets/img/brand/icon-light.png')}}" class="header-brand-img icon-logo" alt="logo">
			<img src="{{URL::asset('assets/img/brand/logo.png')}}" class="header-brand-img desktop-logo theme-logo" alt="logo">
			<img src="{{URL::asset('assets/img/brand/icon.png')}}" class="header-brand-img icon-logo theme-logo" alt="logo"> --}}
		</a>
	</div>
	<div class="main-sidebar-body">
		<ul class="nav">
			<li class="nav-header"><span class="nav-label">Dashboard</span></li>
			<li class="nav-item">
				<a class="nav-link" href="{{url('category')}}"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon"></i><span class="sidemenu-label">Categorias</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{url('competition')}}"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon"></i><span class="sidemenu-label">Competencias</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-wallet sidemenu-icon"></i><span class="sidemenu-label">Reportes</span><i class="angle fe fe-chevron-right"></i></a>
				<ul class="nav-sub">
					<li class="nav-sub-item">
						<a class="nav-sub-link" href="{{url('reports/dojo')}}">Dojo</a>
					</li>
					<li class="nav-sub-item">
						<a class="nav-sub-link" href="{{url('reports/dojo/dev')}}">Dojo Desarrollo</a>
					</li>
					<li class="nav-sub-item">
						<a class="nav-sub-link" href="{{url('reports/dojo/formation')}}">Dojo Formacion</a>
					</li>
					<li class="nav-sub-item">
						<a class="nav-sub-link" href="{{url('reports/organization')}}">Organizacion</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>
<!-- End Sidemenu -->