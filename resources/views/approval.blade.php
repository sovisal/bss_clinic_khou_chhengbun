<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Login | DNK Accountant System</title>

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/custom-style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/login-style.css') }}" rel="stylesheet">
	<style type="text/css">
		.wrap-login100{
			padding-top: 110px;
			padding-bottom: 80px;
		}
		.icon{
			text-align: center;
			font-size: 65px;
		}
		.login100-form {
			width: 350px;
		}
		.login100-form-title{
			padding-bottom: 20px;
		}
		.approved-pic {
			width: 350px;
		}
		.approved-pic img {
			max-width: 100%;
		}

	</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

				<div class="login100-form">
					<div class="icon"><i class="fa fa-user-lock"></i></div>
					<span class="login100-form-title">
						Account Not Approved
					</span>
					<p class="text-center">Please contact the administrator for approval.</p>

					<div class="text-center p-t-50">
						<a class="btn btn-danger" href="{{ route('logout') }}"
						onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
						</a>
	
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
						</form>

						<a class="btn btn-success" href="{{ route('home') }}">Home <i class="fa fa-long-arrow-alt-right"></i></a>
					</div>

					<div class="text-center p-t-166">
					</div>

				</div>
				<div class="approved-pic js-tilt" data-tilt>
					<img src="/images/not-approved.png" alt="IMG">
				</div>
			</div>
		</div>
	</div>
	
	{{-- Javascript --}}
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/tilt.jquery.min.js') }}"></script>
	<script type="text/javascript">

	</script>

</body>
</html>
