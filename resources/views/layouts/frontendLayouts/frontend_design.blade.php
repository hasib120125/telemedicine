<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="{{asset('images/frontend_images/fav.png')}}">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
        <title>E-Health Service</title>
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
			<!-- =================  CSS  ============================ -->
		<link rel="stylesheet" href="{{asset('css/frontend_css/linearicons.css')}}">
		<link rel="stylesheet" href="{{asset('css/frontend_css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/frontend_css/magnific-popup.css')}}">
		<link rel="stylesheet" href="{{asset('css/frontend_css/nice-select.css')}}">
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="{{asset('css/frontend_css/bootstrap.css')}}">
		<link rel="stylesheet" href="{{asset('css/frontend_css/main.css')}}">
		<link rel="stylesheet" href="{{asset('css/frontend_css/about.css')}}">
		<link rel="stylesheet" href="{{asset('css/frontend_css/contact.css')}}">
		<link rel="stylesheet" href="{{asset('css/frontend_css/salvattore.css')}}">
		@stack('styles')
	</head>

	<body>

		@include('layouts.frontendLayouts.header')

        @yield('content')

        @include('layouts.frontendLayouts.footer') 	
		

		<script src="{{asset('js/frontend_js/vendor/jquery-2.2.4.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="{{asset('assets/sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4')}}" crossorigin="anonymous"></script>
        <script src="{{asset('js/frontend_js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/frontend_js/jquery.ajaxchimp.min.js')}}"></script>
        <script src="{{asset('js/frontend_js/jquery.nice-select.min.js')}}"></script>
        <script src="{{asset('js/frontend_js/jquery.sticky.js')}}"></script>
        <script src="{{asset('js/frontend_js/parallax.min.js')}}"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="{{asset('js/frontend_js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('js/frontend_js/waypoints.min.js')}}"></script>
        <script src="{{asset('js/frontend_js/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('js/frontend_js/main.js')}}"></script>


        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-23581568-13');
        </script>
	</body>
</html>
