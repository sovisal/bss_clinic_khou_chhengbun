@extends('layouts.app')

@section('css')
	<style class="text/css">
		label[for="father_status1"],
		label[for="father_status0"],
		label[for="mother_status1"],
		label[for="mother_status0"] {
			cursor: pointer;
		}
	</style>
@endsection

@section('content')

	<div class="card">
		<div class="card-header">
			<b>{!! Auth::user()->subModule() !!}</b>
			
			<div class="card-tools">
				@can('Patient Index')
				<a href="{{route('patient.index')}}" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-table"></i> &nbsp;{{ __('label.buttons.back_to_list', [ 'name' => Auth::user()->module() ]) }}</a>
				@endcan
			</div>

			<!-- Error Message -->
			@component('components.crud_alert')
			@endcomponent

		</div>


		{!! Form::open(['url' => route('patient.store'),'method' => 'post','autocomplete'=>'off']) !!}

		<div class="card-body">
			@include('patient.form')
		</div>
		<!-- ./card-body -->
		
		<div class="card-footer text-muted text-center">
			@include('components.submit')
		</div>
		<!-- ./card-Footer -->
		{{ Form::close() }}

	</div>

	<br/>
	<br/>
	<br/>
	<br/>

@endsection