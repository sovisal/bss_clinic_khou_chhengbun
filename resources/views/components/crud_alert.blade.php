@if (session('success'))
	<div class="alert alert-success alert-dismissible mt-4 fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{!! session('success') !!}
	</div>
@endif
@if (session('warning'))
	<div class="alert alert-warning alert-dismissible mt-4 fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{!! session('warning') !!}
	</div>
@endif
@if (session('error'))
	<div class="alert alert-danger alert-dismissible mt-4 fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{!! session('error') !!}
	</div>
@endif
@if (count($errors) > 0)
	<div class="alert alert-danger alert-dismissible mt-4 fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<ul class="mb-0">
			@foreach ($errors->all() as $error)
					<li>{!! $error !!}</li>
			@endforeach
		</ul>
	</div>
@endif