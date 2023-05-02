
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Inventory System</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('template/')}}/assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{asset('template/')}}/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['{{asset('template/')}}/assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('template/')}}/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset('template/')}}/assets/css/azzara.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{asset('template/')}}/assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="purple">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			
		</div>

		<!-- Sidebar -->
		<div class="sidebar">
			
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<a href="">
								<i class="fa fa-user"></i>
							</a>
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
                                {{ Auth::user()->name }}
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
							
										</a>
									</li>
								</ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
							</div>
						</div>
					</div>
					@include('layouts.nav')
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">
                            @yield('title')
                        </h4>
					</div>
					@yield('content')
				</div>
			</div>
			
		</div>
		
	</div>
	<!--   Core JS Files   -->
	<script src="{{asset('template/')}}/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="{{asset('template/')}}/assets/js/core/popper.min.js"></script>
	<script src="{{asset('template/')}}/assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="{{asset('template/')}}/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="{{asset('template/')}}/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{asset('template/')}}/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<!-- Moment JS -->
	<script src="{{asset('template/')}}/assets/js/plugin/moment/moment.min.js"></script>

	<!-- Chart JS -->
	<script src="{{asset('template/')}}/assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="{{asset('template/')}}/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="{{asset('template/')}}/assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="{{asset('template/')}}/assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="{{asset('template/')}}/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- Bootstrap Toggle -->
	<script src="{{asset('template/')}}/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="{{asset('template/')}}/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="{{asset('template/')}}/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Google Maps Plugin -->
	<script src="{{asset('template/')}}/assets/js/plugin/gmaps/gmaps.js"></script>

	<!-- Sweet Alert -->
	<script src="{{asset('template/')}}/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Azzara JS -->
	<script src="{{asset('template/')}}/assets/js/ready.min.js"></script>
</body>
</html>