<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Sign Up</title>

	<!-- Icons font CSS-->
	<link href="/js/register/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
	<link href="/js/register/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

	<!-- Vendor CSS-->
	<link href="/js/register/select2/select2.min.css" rel="stylesheet" media="all">
	<link href="/js/register/datepicker/daterangepicker.css" rel="stylesheet" media="all">

	<!-- Main CSS-->
	<link href="/js/register/main.css" rel="stylesheet" media="all">
	<style type="text/css">
		.input--style-4.is-invalid{
			border: 1px solid red;
			box-shadow: 0 0 5px rgba(229, 62, 62, 0.3) inset;
		}
		small.has-error{
			color: red;
			font-size: 11px;
			padding: 0;
			margin-bottom: -10px;
			display: block;
		}
	</style>
</head>

<body>
	
	<div class="page-wrapper font-poppins">
		<div class="wrapper wrapper--w680">
			<div class="card card-4">
				<div class="card-body">
					<h2 class="title">Member Registration</h2>
					<form method="POST" action="{{ route('register') }}">
							@csrf
						<div class="row row-space">
							<div class="col-2">
								<div class="input-group">
									<label class="label">first name</label>
									<input class="input--style-4 @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ old('first_name') }}" required>
									@error('first_name')
										<small class="has-error">
											<strong>{{ $message }}</strong>
										</small>
									@enderror
								</div>
							</div>
							<div class="col-2">
								<div class="input-group">
									<label class="label">last name</label>
									<input class="input--style-4 @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ old('last_name') }}" required>
									@error('last_name')
										<small class="has-error">
											<strong>{{ $message }}</strong>
										</small>
									@enderror
								</div>
							</div>
						</div>
						<div class="row row-space">
							<div class="col-2">
								<div class="input-group">
									<label class="label">Phone Number</label>
									<input class="input--style-4" type="text" name="phone" value="{{ old('phone') }}">
								</div>
							</div>
							<div class="col-2">
								<div class="input-group">
									<label class="label">Gender</label>
									<div class="p-t-10">
										<label class="radio-container m-r-45">Male
											<input type="radio" name="gender" value="1" {{ ((old('gender') == 1)? 'checked="checked"' : 'checked="checked"' ) }}>
											<span class="checkmark"></span>
										</label>
										<label class="radio-container">Female
											<input type="radio" name="gender" value="2" {{ ((old('gender') == 2)? 'checked="checked"' : '' ) }}>
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="input-group">
							<label class="label">Email</label>
							<input class="input--style-4 @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
							@error('email')
								<small class="has-error">
									<strong>{{ $message }}</strong>
								</small>
							@enderror
						</div>
						<div class="row row-space">
							<div class="col-2">
								<div class="input-group">
									<label class="label">Password</label>
									<input class="input--style-4 @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="new-password">
									@error('password')
										<small class="has-error">
											<strong>{{ $message }}</strong>
										</small>
									@enderror
								</div>
							</div>
							<div class="col-2">
								<div class="input-group">
									<label class="label">Confirm password</label>
									<input class="input--style-4 @error('password_confirmation') is-invalid @enderror" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"/>
									@error('password_confirmation')
										<small class="has-error">
											<strong>{{ $message }}</strong>
										</small>
									@enderror
								</div>
							</div>
						</div>

						<div class="row row-space">
							<div class="col-2">
								<button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
							</div>
							<div class="col-2">
								<div class="text-center">
									<a class="txt2" href="{{ route('login') }}">
										Log In Instead
										<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
									</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<!-- Jquery JS-->
	<script src="/js/register/jquery/jquery.min.js"></script>
	<!-- Vendor JS-->
	<script src="/js/register/select2/select2.min.js"></script>
	<script src="/js/register/datepicker/moment.min.js"></script>
	<script src="/js/register/select2/select2.min.js"></script>
	<script src="/js/register/datepicker/daterangepicker.js"></script>

	<!-- Main JS-->
	<script src="/js/register/global.js"></script>

</body>
</html>
<!-- end document-->