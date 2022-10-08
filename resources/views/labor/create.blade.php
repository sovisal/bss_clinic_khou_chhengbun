@extends('layouts.app')

@section('css')
	{{ Html::style('/css/invoice-print-style.css') }}
	<style type="text/css">
		.table td{
			vertical-align: middle;
		}
	</style>
@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<b>{!! Auth::user()->subModule() !!}</b>
		<div class="card-tools">
			@can('Labor Report')
			<a href="{{route('labor.report')}}" class="btn btn-info btn-sm btn-flat"><i class="fa fa-file-alt"></i> &nbsp;{{ __('label.buttons.report', [ 'name' => Auth::user()->module() ]) }}</a>
			@endcan
			@can('Labor Index')
			<a href="{{route('labor.index')}}" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-table"></i> &nbsp;{{ __('label.buttons.back_to_list', [ 'name' => Auth::user()->module() ]) }}</a>
			@endcan
		</div>

		<!-- Error Message -->
		@component('components.crud_alert')
		@endcomponent

	</div>

	{!! Form::open(['url' => route('labor.store', $type),'id' => 'submitForm','method' => 'post','class' => 'mt-3', 'autocomplete' => 'off']) !!}
	<div class="card-body">
		@include('labor.form')
		<div class="card card-outline card-primary mt-4">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-list"></i>&nbsp;
					{{ __('alert.modal.title.labor_detail') }}
				</h3>
				<div class="card-tools">
					{{-- <button type="button" class="btn btn-flat btn-sm btn-success btn-prevent-submit" id="btn_add_service"><i class="fa fa-plus"></i> {!! __('label.buttons.add_item') !!}</button> --}}
				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				{!! $item_list !!}
			</div>			
			<!-- /.card-body -->
		</div>
	</div>
	<!-- ./card-body -->
	
	<div class="card-footer text-muted text-center">
		@include('components.submit')
	</div>
	<!-- ./card-Footer -->
	{{ Form::close() }}

</div>

@include('labor.modal')

@endsection

@section('js')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
	$(".main_chbox").click(function(){
		$('.child_chbox_'+ $(this).data('id')).not(this).prop('checked', this.checked);
		$('.child_input_'+ $(this).data('id')).not(this).prop('disabled', !this.checked);
		var sub = $('.sub_chbox_'+ $(this).data('id'));
		sub.not(this).prop('checked', this.checked);
		$('.child_chbox_'+ sub.data('id')).not(this).prop('checked', this.checked);
		$('.child_input_'+ sub.data('id')).not(this).prop('disabled', !this.checked);
	});
	$(".sub_chbox").click(function(){
		$('.child_chbox_'+ $(this).data('id')).not(this).prop('checked', this.checked);
		$('.child_input_'+ $(this).data('id')).not(this).prop('disabled', !this.checked);
	});

	$('.service_id').change(function (event) {
		$(this).val($(this).data('value'));
		if ($(this).is(':checked')) {
			$('.toggle-'+ $(this).val()).attr('disabled', false);
		}else{
			$('.toggle-'+ $(this).val()).attr('disabled', true);
		}
	});

	$('.btn-prevent-submit').click(function (event) {
		event.preventDefault();
	});

	$('#btn_add_item').click(function (event) {
		event.preventDefault();

		var service_ids = [];
		var n = $( ".labor_item" ).length;
		$( ".chb_service" ).each(function( index ) {
			if ($(this).is(':checked')) {
				service_ids.push($(this).val());
			}
		});

		if (service_ids.length != 0) {
			$.ajax({
				url: "{{ route('labor.getCheckedServicesList') }}",
				method: 'post',
				data: {
					ids: service_ids,
					no: n,
				},
				success: function (data) {
					$('.item_list').append(data.checked_services_list);
					$('#check_all_service').iCheck('uncheck');
					$('#category_id').val('').trigger('change');
					$('#service_check_list').html('');
					$('#create_labor_item_modal').modal('hide');
					$(".is_number").keyup(function () {
						isNumber($(this))
					});
				}
			});
		}

	});

	function removeCheckedService(id) {
		$('#'+id).remove();
	}

	$(".select2_pagination").change(function () {
		$('[name="txt_search_field"]').val($('.select2-search__field').val());
	});
	
	function select2_search (term) {
		$(".select2_pagination").select2('open');
		var $search = $(".select2_pagination").data('select2').dropdown.$search || $(".select2_pagination").data('select2').selection.$search;
		$search.val(term);
		$search.trigger('keyup');
	}

	$(".select2_pagination").select2({
		theme: 'bootstrap4',
		placeholder: "{{ __('label.form.choose') }}",
		allowClear: true,
		ajax: {
			url: "{{ route('patient.getSelect2Items') }}",
			method: 'post',
			dataType: 'json',
			data: function(params) {
				return {
						term: params.term || '',
						page: params.page || 1
				}
			},
			cache: true
		}
	});	

	function load_service_info(id, _this){
		_this = $(_this);
		let value = _this.val();
		if($('option[value="'+value+'"]').data('price')) $('#input-price-'+id).val($('option[value="'+value+'"]').data('price'));
		if($('option[value="'+value+'"]').data('description')) $('#input-description-'+id).val($('option[value="'+value+'"]').data('description'));
	}

	$(document).on('change', '.category_check_all', function () {
		let list_subling = $(this).parent().parent().parent().find('li');

		list_subling.find('input[type="checkbox"]').prop('checked', $(this).val() == 1);	
		list_subling.find('input[type="text"]').prop('disabled', $(this).val() != 1);	
		list_subling.find('select').prop('disabled', $(this).val() != 1);
	})
</script>
@endsection