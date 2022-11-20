@extends('layouts.app')

@section('css')
<link href="{{ asset('/css/daterangepicker.css') }}" rel="stylesheet">
<style type="text/css">

</style>
@endsection

@section('content')
	<div class="card">
		<div class="card-header">
			<b>{!! Auth::user()->subModule() !!}</b>
			<div class="card-tools">
				@can('EyeExaminationes Create')
				<a href="{{route('eye_examination.create', $type)}}" class="btn btn-success btn-flat btn-sm"><i class="fa fa-plus"></i> &nbsp;{{ __('label.buttons.create') }}</a>
				@endcan
			</div>
			<!-- Error Message -->
			@component('components.crud_alert')
			@endcomponent
		</div>

		<div class="card-body">
			<div class="row justify-content-center">
				<div class="col-sm-3">
					<div class="form-group">
						{!! Html::decode(Form::label('date', __('label.form.labor.choose_date')." <small>*</small>")) !!}
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
							</div>
							<input type="text" class="form-control pull-right" id="dateRangePicker" autocomplete="off">
							<input type="hidden" class="form-control" value="{{ date('Y-m-d') }}" id="from">
							<input type="hidden" class="form-control" value="{{ date('Y-m-d') }}" id="to">
						</div>
					</div>
				</div>
			</div>

	  <table class="table table-bordered dt-server expandable-table" width="100%" id="eye_examination_table">
				<thead>
					<tr>
						<th class="text-center" width="10%">{!! __('module.table.eye_examination.number') !!}</th>
						<th class="text-center" width="12%">{!! __('module.table.date') !!}</th>
						<th class="text-center">{!! __('module.table.labor.pt_name') !!}</th>
						<th class="text-center" width="13%">{!! __('module.table.labor.pt_phone') !!}</th>
						<th class="text-center" width="10%">{!! __('module.table.labor.pt_age') !!}</th>
						<th class="text-center" width="10%">{!! __('module.table.labor.pt_gender') !!}</th>
						<th width="18%" class="text-center">{!! __('module.table.action') !!}</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>

	<span class="sr-only" id="deleteAlert" data-title="{{ __('alert.swal.title.delete', ['name' => Auth::user()->module()]) }}" data-text="{{ __('alert.swal.text.unrevertible') }}" data-btnyes="{{ __('alert.swal.button.yes') }}" data-btnno="{{ __('alert.swal.button.no') }}" data-rstitle="{{ __('alert.swal.result.title.success') }}" data-rstext="{{ __('alert.swal.result.text.delete') }}"> Delete Message </span>

	</div>

	{{-- Password Confirm modal --}}
	@component('components.confirm_password')@endcomponent

@endsection

@section('js')
	<script src="{{ asset('/js/daterangepicker.js') }}"></script>
	<script type="text/javascript">
		$('#dateRangePicker').daterangepicker({
			ranges: {
				'Today'       : [moment(), moment()],
				'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month'  : [moment().startOf('month'), moment().endOf('month')],
				'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
				},
				startDate: moment().startOf('month'),
				endDate  : moment().endOf('month')
			},
			function (start, end) {
				$('#from').val(start.format('YYYY-MM-DD'));
				$('#to').val(end.format('YYYY-MM-DD'));
				getDatatable(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'))
			}
		)

		getDatatable(moment().startOf('month').format('YYYY-MM-DD'), moment().endOf('month').format('YYYY-MM-DD'));

		function getDatatable(from, to) {
			// Load Data to datatable
			$('#eye_examination_table').DataTable().destroy();
			dataTableEyeExamination = $('#eye_examination_table').DataTable({
				"language": (('{{ session('locale') }}' == 'en')? '' : datatableKH),
				processing: true,
				serverSide: true,
				"lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
				order: [[0, "desc"]],
				ajax: {
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: '{{ route('eye_examination.getDatatable') }}',
					data: { 'from' : from, 'to' : to },
					type: 'post',
					dataSrc: function(json) { return json.data;  }
				},
				columns: [
					{data: 'number', name: 'number', className: 'text-center'},
					{data: 'date', name: 'date', className: 'text-center'},
					{data: 'pt_name', name: 'pt_name'},
					{data: 'pt_phone', name: 'pt_phone'},
					{data: 'pt_age', name: 'pt_age', className: 'text-center'},
					{data: 'pt_gender', name: 'pt_gender', className: 'text-center'},
					{data: 'actions', name: 'actions', className: 'text-center', searchable: false, sortable: false}
				],
				rowCallback: function( row, data ) {
					$('td:eq(6)', row).html( `<button type="button" data-url="/eye_examination/${ data.id }/print" class="btn btn-sm btn-flat btn-success btn-print-eye_examination"><i class="fa fa-print"></i></button>
												@Can("EyeExamination Edit")
													<a href="/eye_examination/${ data.id }/edit" class="btn btn-sm btn-flat btn-info"><i class="fa fa-pencil-alt"></i></a>
												@endCan
												@Can("EyeExamination Delete")
													<button type="button" class="btn btn-sm btn-flat btn-danger BtnDeleteConfirm" value="${ data.id }"><i class="fa fa-trash-alt"></i></button>
													<form action="/eye_examination/${ data.id }/delete" id="form-item-${ data.id }" class="sr-only" method="POST" accept-charset="UTF-8">
														{{ csrf_field() }}
														<input type="hidden" name="_method" value="DELETE" />
														<input type="hidden" name="passwordDelete" value="" />
													</form>
												@endCan` );
				},
				"initComplete": function( settings, json ) {
					$('#eye_examination_table [type="search"]').addClass('sr-only');
					$('#eye_examination_table_search_input').remove();
					$('#eye_examination_table_table_filter').append('<input type="text" class="form-control input-sm" id="eye_examination_table_search_input">');
					$('#eye_examination_table_search_input').keyup(function (e) {
						if (e.keyCode === 13) {
							$('#eye_examination_table [type="search"]').val($(this).val()).keyup();
						}
					});
					setTimeout( function () {
						if ($('[name="txt_filter_search"]').val() != '' ) {
							$('#eye_examination_table_search_input').val($('[name="txt_filter_search"]').val());
							$('#eye_examination_table [type="search"]').val($('[name="txt_filter_search"]').val()).keyup();
							$('[name="txt_filter_search"]').val('');
						}
					}, 250);
				},
				"drawCallback": function( settings, json ) {
					// Change Status button Click
					$('.btn_status').click(function () {
						var btn_status = $(this);
						const swalWithBootstrapButtons = Swal.mixin({
							customClass: {
								confirmButton: 'btn btn-success btn-flat ml-2 py-2 px-3',
								cancelButton: 'btn btn-danger btn-flat mr-2 py-2 px-3'
							},
							buttonsStyling: false
						})
						swalWithBootstrapButtons.fire({
						title: '{{ __("alert.swal.title.status") }}',
						icon: 'question',
						showCancelButton: true,
						confirmButtonText: '{{ __("alert.swal.button.yes") }}',
						cancelButtonText: '{{ __("alert.swal.button.no") }}',
						reverseButtons: true
						}).then((result) => {
							if (result.value) {
								$.ajax({
									url: "/eye_examination/"+ btn_status.data('id') +"/status",
									type: 'post',
									data: {  },
								})
								.done(function( data ) {
									Swal.fire({
										icon: 'success',
										title: "{{ __('alert.swal.result.title.success') }}",
										confirmButtonText: "{{ __('alert.swal.button.yes') }}",
										timer: 1500
									})
									.then((result) => {
										btn_status.removeClass( ((data.status == 1)? 'btn-danger' : 'btn-success')).addClass(((data.status == 1)? 'btn-success' : 'btn-danger'));
									})
								});
							}
						})
					});

					$('.BtnDeleteConfirm').click(function () {
						$('#item_id').val($(this).val());
						$('#modal_confirm_delete').modal();
					});

					$('.submit_confirm_password').click(function () {
						var id = $('#item_id').val();
						var password_confirm = $('#password_confirm').val();
						$('[name="passwordDelete"]').val(password_confirm);
						if (password_confirm!='') {
							$.ajax({
								url: "{{ route('user.password_confirm') }}",
								type: 'post',
								data: {id:id, _token:'{{ csrf_token() }}', password_confirm:password_confirm},
							})
							.done(function( result ) {
									if(result == true){
										Swal.fire({
											icon: 'success',
											title: "{{ __('alert.swal.result.title.success') }}",
											confirmButtonText: "{{ __('alert.swal.button.yes') }}",
											timer: 1500
										})
										.then((result) => {
											$( "form" ).submit(function( event ) {
												$('button').attr('disabled','disabled');
											});
											$('[name="passwordDelete"]').val(password_confirm);
											$("#form-item-"+id).submit();
										})
									}else{
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
						}else{
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

					function openPrintWindow(url, name) {
						var printWindow = window.open(url, name, "width="+ screen.availWidth +",height="+ screen.availHeight +",_blank");
						var printAndClose = function () {
							if (printWindow.document.readyState == 'complete') {
								clearInterval(sched);
								printWindow.print();
								printWindow.close();
							}
						}
							var sched = setInterval(printAndClose, 2000);
					};

					jQuery(document).ready(function ($) {
						$(".btn-print-eye_examination").on("click", function (e) {
							var myUrl = $(this).attr('data-url');
							e.preventDefault();
							openPrintWindow(myUrl, "to_print");
						});
					});
				}
			});
		}

	</script>
@endsection
