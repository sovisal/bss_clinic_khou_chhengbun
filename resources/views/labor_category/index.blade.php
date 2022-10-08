@extends('layouts.app')

@section('css')
	<style type="text/css">
		
	</style>
@endsection

@section('content')
	<div class="card">
		<div class="card-header">
			<b>{!! Auth::user()->subModule() !!}</b>
			
			<div class="card-tools">
				@can('Labor Category Create')
				<a href="{{route('labor_category.create')}}" class="btn btn-success btn-flat btn-sm"><i class="fa fa-plus"></i> &nbsp;{{ __('label.buttons.create') }}</a>
				@endcan
				
			</div>

			<!-- Error Message -->
			@component('components.crud_alert')
			@endcomponent

		</div>

		<div class="card-body">
			
      <table id="datatables" class="table table-bordered table-hover">
        <thead>
	        <tr>
	          <th width="6%">{!! __('module.table.no') !!}</th>
	          <th width="18%">{{ __('module.table.name') }}</th>
	          <th>{{ __('module.table.description') }}</th>
	          <th width="10%">{{ __('module.table.action') }}</th>
	        </tr>
        </thead>
        <tbody>
        	@foreach($labor_categories as $i => $labor_category)
						<tr>
							<td class="text-center">{{ ++$i }}</td>
							<td>{{ $labor_category->name }}</td>
							<td>{{ $labor_category->description }}</td>
							<td class="text-right">

								@can('Labor Category Edit')
								{{-- Edit Button --}}
								<a href="{{ route('labor_category.edit',$labor_category->id) }}" class="btn btn-info btn-sm btn-flat" data-toggle="tooltip" data-placement="left" title="{{ __('label.buttons.edit') }}"><i class="fa fa-pencil-alt"></i></a>
								@endcan

								{{-- Delete Button --}}
								{{-- @can('Labor Category Delete')
									<button class="btn btn-danger btn-sm btn-flat BtnDelete" value="{{ $labor_category->id }}" data-toggle="tooltip" data-placement="left" title="{{ __('label.buttons.delete') }}"><i class="fa fa-trash-alt"></i></button>
									{{ Form::open(['url'=>route('labor_category.destroy', $labor_category->id), 'id' => 'form-item-'.$labor_category->id, 'class' => 'sr-only']) }}
									{{ Form::hidden('_method','DELETE') }}
									{{ Form::close() }}
								@endcan --}}
								
								@can('Labor Delete')
								{{-- Delete Button --}}
								<button class="btn btn-danger btn-sm btn-flat BtnDeleteConfirm" value="{{ $labor_category->id }}" data-toggle="tooltip" data-placement="left" title="{{ __('label.buttons.delete') }}"><i class="fa fa-trash-alt"></i></button>
								{{ Form::open(['url'=>route('labor_category.destroy', $labor_category->id), 'id' => 'form-item-'.$labor_category->id, 'class' => 'sr-only']) }}
								{{ Form::hidden('_method','DELETE') }}
								{{ Form::hidden('passwordDelete','') }}
								{{ Form::close() }}
								@endcan

							</td>
						</tr>
        	@endforeach
        </tbody>
			</table>
		</div>

    <span class="sr-only" id="deleteAlert" data-title="{{ __('alert.swal.title.delete', ['name' => Auth::user()->module()]) }}" data-text="{{ __('alert.swal.text.unrevertible') }}" data-btnyes="{{ __('alert.swal.button.yes') }}" data-btnno="{{ __('alert.swal.button.no') }}" data-rstitle="{{ __('alert.swal.result.title.success') }}" data-rstext="{{ __('alert.swal.result.text.delete') }}"> Delete Message </span>
		{{-- Password Confirm modal --}}
		@component('components.confirm_password')@endcomponent

	</div>
@endsection

@section('js')
	<script type="text/javascript">

		$('.BtnDeleteConfirm').click(function() {
				$('#item_id').val($(this).val());
				$('#modal_confirm_delete').modal();
		});

		$('.submit_confirm_password').click(function() {
				var id = $('#item_id').val();
				var password_confirm = $('#password_confirm').val();
				$('[name="passwordDelete"]').val(password_confirm);
				if (password_confirm != '') {
						$.ajax({
										url: "{{ route('user.password_confirm') }}",
										type: 'post',
										data: {
												id: id,
												_token: '{{ csrf_token() }}',
												password_confirm: password_confirm
										},
								})
								.done(function(result) {
										if (result == true) {
												Swal.fire({
																icon: 'success',
																title: "{{ __('alert.swal.result.title.success') }}",
																confirmButtonText: "{{ __('alert.swal.button.yes') }}",
																timer: 1500
														})
														.then((result) => {
																$("form").submit(function(event) {
																		$('button').attr('disabled', 'disabled');
																});
																$('[name="passwordDelete"]').val(password_confirm);
																$("#form-item-" + id).submit();
														})
										} else {
												Swal.fire({
																icon: 'warning',
																title: "{{ __('alert.swal.result.title.wrong',['name'=>'ពាក្យសម្ងាត់']) }}",
																confirmButtonText: "{{ __('alert.swal.button.yes') }}",
																timer: 2500
														})
														.then((result) => {
																$('#modal_confirm_delete').modal();
														})
										}
								});
				} else {
						Swal.fire({
										icon: 'warning',
										title: "{{ __('alert.swal.title.empty') }}",
										confirmButtonText: "{{ __('alert.swal.button.yes') }}",
										timer: 1500
								})
								.then((result) => {
										$('#modal_confirm_delete').modal();
								})
				}
		});
	</script>
@endsection