<!doctype html>
<html lang="en">

<head>
	<title>Dinas Pertanian Peternakan dan Perikanan Kab.Toba</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/linearicons/style.css')}}">

	<link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">

	<link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}">

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>

	<div id="wrapper">
		@include('Layouts.Include.navbar')

		@include('Layouts.Include.sidebar')

		@yield('content')

		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
			</div>
		</footer>
	</div>

	<script src="{{asset('admin/assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('admin/assets/scripts/klorofil-common.js')}}"></script>
	@yield('footer')
	
</body>

</html>
