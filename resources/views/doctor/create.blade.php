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
				@can('Doctor Index')
				<a href="{{route('doctor.index')}}" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-table"></i> &nbsp;{{ __('label.buttons.back_to_list', [ 'name' => Auth::user()->module() ]) }}</a>
				@endcan
			</div>

			<!-- Error Message -->
			@component('components.crud_alert')
			@endcomponent

		</div>


		{!! Form::open(['url' => route('doctor.store'),'method' => 'post','autocomplete'=>'off']) !!}

		<div class="card-body">
			@include('doctor.form')
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

@section('js')
	<script type="text/javascript">

		$('[name="address_province_id"]').change( function(e){
			if ($(this).val() != '') {
				$.ajax({
					url: "{{ route('province.getSelectDistrict') }}",
					method: 'post',
					data: {
						id: $(this).val(),
					},
					success: function (data) {
						$('[name="address_district_id"]').attr({"disabled":false});
						$('[name="address_district_id"]').html(data);
					}
				});
			}else{
				$('[name="address_district_id"]').attr({"disabled":true});
				$('[name="address_district_id"]').html('<option value="">{{ __("label.form.choose") }}</option>');
				
			}
		});


	</script>
@endsection