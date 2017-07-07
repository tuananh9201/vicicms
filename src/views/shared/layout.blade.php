<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="vicitech">
	<link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
	<title>Quản trị - @yield('title')</title>

	<!--Core CSS -->
	<link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
	{{--<link href="{{asset('admin/css/bootstrap-switch.css')}}" rel="stylesheet"> --}}
	<link href="{{asset('admin/css/bootstrap-reset.css')}}" rel="stylesheet">
	<link href="{{asset('admin/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
	<script src="{{asset('ckeditor/ckeditor/ckeditor.js')}}"></script>
	@stack('styles')
	<!-- Custom styles for this template -->
	<link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
	@stack('custom-style')
	<link href="{{asset('admin/css/style-responsive.css')}}" rel="stylesheet">
	

</head>
<body>
<main>
	@include('vendor.ViciCMS.shared.header')
	@include('vendor.ViciCMS.shared.sidebar')
	<div class="container-fluid">
		<section id="main-content">
			<section class="wrapper">
				@yield('content')
			</section>
		</section>
		
	</div>
</main>



<script src="{{asset('admin/js/jquery.min.js')}}"></script>
<script src="{{asset('admin/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>




@stack('scripts')
<script src="{{asset('admin/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('admin/js/bootstrap-switch.js')}}"></script>
<script src="{{asset('admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>


<!--common script init for all pages-->
<script src="{{asset('admin/js/scripts.js')}}"></script>
@stack('custom-script')
<!--script for this page-->
</body>
</html>