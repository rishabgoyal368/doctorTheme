<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from mediqu.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Oct 2020 13:21:23 GMT -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>{{env('APP_NAME')}} </title>
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
	<link href="{{asset('vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('vendor/chartist/css/chartist.min.css')}}">
	<link href="{{asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
	<link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">



	@php
	if(Auth::guard('admin')->check())
	{
	$user = Auth::guard('admin')->user();
	}
	else if(Auth::guard('cakerTaker')->check())
	{
	$user = Auth::guard('cakerTaker')->user();
	}
	@endphp


</head>

<body>

	<!--*******************
        Preloader start
    ********************-->
	<div id="preloader">
		<div class="sk-three-bounce">
			<div class="sk-child sk-bounce1"></div>
			<div class="sk-child sk-bounce2"></div>
			<div class="sk-child sk-bounce3"></div>
		</div>
	</div>
	<!--*******************
        Preloader end
    ********************-->
	<!--**********************************
        Main wrapper start
    ***********************************-->
	<div id="main-wrapper">

		<!--**********************************
            Nav header start
        ***********************************-->
		<div class="nav-header">
			@if(Auth::guard('admin')->check())
			<a href="{{url('/admin/home')}}" class="brand-logo">
				@elseif(Auth::guard('cakerTaker')->check())
				<a href="{{url('/employee/home')}}" class="brand-logo">
					@endif

					<img class="logo-abbr" src="{{asset('images/logo.png')}}" alt="">
					<img class="logo-compact" src="{{asset('images/logo-text.png')}}" alt="">
					<img class="brand-title" src="{{asset('images/logo-text.png')}}" alt="">
				</a>

				<div class="nav-control">
					<div class="hamburger">
						<span class="line"></span><span class="line"></span><span class="line"></span>
					</div>
				</div>
		</div>
		<!--**********************************
            Nav header end
        ***********************************-->




		<!--**********************************
            Header start
        ***********************************-->
		<div class="header">
			<div class="header-content">
				<nav class="navbar navbar-expand">
					<div class="collapse navbar-collapse justify-content-between">
						<div class="header-left">
							<div class="dashboard_bar">
								<!-- Form Validat -->
							</div>
							@include('admin.layouts.response')
						</div>

						<ul class="navbar-nav header-right">
							<li class="nav-item dropdown header-profile">
								<a class="nav-link" href="#" role="button" data-toggle="dropdown">
									<div class="header-info">
										<span>{{$user['name']}}</span>
										@if(@$user['type'] == '1')
										<small>Doctor</small>
										@elseif($user['type'] == '2')
										<small>Care Taker</small>
										@else
										<small>ADMIN</small>
										@endif

									</div>
									@php
									if(@$user->profile_image)
									{
									$image = url('/upload/profile').'/'.$user->profile_image;
									}
									else{
									$image = asset('images/profile/small/pic1.jpg');
									}
									@endphp
									<img src="{{$image}}" width="20" alt="" />
								</a>
								@if(Auth::guard('admin')->check())
								<div class="dropdown-menu dropdown-menu-right">
									<a href="{{url('admin/profile')}}" class="dropdown-item ai-icon">
										<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
											<circle cx="12" cy="7" r="4"></circle>
										</svg>
										<span class="ml-2">Profile </span>
									</a>
									<a href="{{url('admin/change-password')}}" class="dropdown-item ai-icon">
										<svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
											<polyline points="22,6 12,13 2,6"></polyline>
										</svg>
										<span class="ml-2">Change Password </span>
									</a>
									<a href="{{route('admin.logout')}}" class="dropdown-item ai-icon">
										<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
											<polyline points="16 17 21 12 16 7"></polyline>
											<line x1="21" y1="12" x2="9" y2="12"></line>
										</svg>
										<span class="ml-2">Logout </span>
									</a>
								</div>
								@endif
								@if(Auth::guard('cakerTaker')->check())
								<div class="dropdown-menu dropdown-menu-right">
									<a href="{{url('employee/profile')}}" class="dropdown-item ai-icon">
										<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
											<circle cx="12" cy="7" r="4"></circle>
										</svg>
										<span class="ml-2">Profile </span>
									</a>
									<a href="{{url('employee/change-password')}}" class="dropdown-item ai-icon">
										<svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
											<polyline points="22,6 12,13 2,6"></polyline>
										</svg>
										<span class="ml-2">Change Password </span>
									</a>
									<a href="{{route('employee.logout')}}" class="dropdown-item ai-icon">
										<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
											<polyline points="16 17 21 12 16 7"></polyline>
											<line x1="21" y1="12" x2="9" y2="12"></line>
										</svg>
										<span class="ml-2">Logout </span>
									</a>
								</div>
								@endif


							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
		<!--**********************************
            Header end ti-comment-alt
        ***********************************-->

		<!--**********************************
            Sidebar start
        ***********************************-->
		@include('admin.layouts.sidebar')
		<!--**********************************
            Sidebar end
        ***********************************-->

		@yield('content')

		<!--**********************************
            Footer start
        ***********************************-->
		<div class="footer">
			<div class="copyright">
				<p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2020</p>
			</div>
		</div>
		<!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

		<!--**********************************
           Support ticket button end
        ***********************************-->


	</div>
	<!--**********************************
        Main wrapper end
    ***********************************-->

	<!--**********************************
        Scripts
    ***********************************-->
	<!-- Required vendors -->
	<script src="{{asset('vendor/global/global.min.js')}}"></script>
	<script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
	<script src="{{asset('js/custom.min.js')}}"></script>
	<script src="{{asset('js/deznav-init.js')}}"></script>
	<!-- Apex Chart -->
	<script src="{{asset('vendor/apexchart/apexchart.js')}}"></script>


	<!-- Dashboard 1 -->
	<script src="{{asset('js/dashboard/dashboard-1.js')}}"></script>

	<!-- Jquery Validation -->
	<script src="{{asset('vendor/jquery-validation/jquery.validate.min.js')}}"></script>
	<!-- Form validate init -->
	<script src="{{asset('js/plugins-init/jquery.validate-init.js')}}"></script>

	<!-- Datatable -->
	<script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('js/plugins-init/datatables.init.js')}}"></script>


</body>

<!-- Mirrored from mediqu.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Oct 2020 13:21:26 GMT -->

</html>