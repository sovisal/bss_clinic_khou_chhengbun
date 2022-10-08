<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
		{{ Html::style('/css/bootstrap3.css') }}
		{{ Html::style('/css/custom-style.css') }}
    @yield('css')

	</head>
	<body>
    
  @yield('content')

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/custom-js.js') }}"></script>
  @yield('js')
	</body>
 </html>