<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>Mobile Social Software Learnability Index</title>
		<meta name="description" content="Worthy a Bootstrap-based, Responsive HTML5 Template">
		<meta name="author" content="htmlcoder.me">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Favicon -->
		<link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">

		<!-- Web Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>

		<!-- Bootstrap core CSS -->
		<link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">

		<!-- Font Awesome CSS -->
		<link href="{{asset('fonts/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

		<!-- Plugins -->
		<link href="{{asset('css/animations.css')}}" rel="stylesheet">

		<!-- Worthy core CSS file -->
		<link href="{{asset('css/style.css')}}" rel="stylesheet">

		<!-- Custom css --> 
		<link href="{{asset('css/custom.css')}}" rel="stylesheet">
	</head>
	<script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
	<body class="no-trans">
		<!-- scrollToTop -->
		<!-- ================ -->
		<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

			@yield('content')
		<footer id="footer">
			<!-- .subfooter start -->
			<!-- ================ -->
			<div class="subfooter">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p class="text-center">Copyright © 2017 MSSLI<br>
							All Rights Reserved
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- .subfooter end -->

		</footer>
		<!-- footer end -->

		<!-- JavaScript files placed at the end of the document so the pages load faster
		================================================== -->
		<!-- Jquery and Bootstap core js files -->
		<script type="text/javascript" src="{{asset('plugins/jquery.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

		<!-- Modernizr javascript -->
		<script type="text/javascript" src="{{asset('plugins/modernizr.js')}}"></script>

		<!-- Isotope javascript -->
		<script type="text/javascript" src="{{asset('plugins/isotope/isotope.pkgd.min.js')}}"></script>
		
		<!-- Backstretch javascript -->
		<script type="text/javascript" src="{{asset('plugins/jquery.backstretch.min.js')}}"></script>

		<!-- Appear javascript -->
		<script type="text/javascript" src="{{asset('plugins/jquery.appear.js')}}"></script>

		<!-- Initialization of Plugins -->
		<script type="text/javascript" src="{{asset('js/template.js')}}"></script>

		<!-- Custom Scripts -->
		<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
		@stack('js-scripts')
	</body>
</html>
