@extends('layouts.app')

@section('css')
<link href="{{ asset('/css/daterangepicker.css') }}" rel="stylesheet">
{{ Html::style('/css/invoice-print-style.css') }}
<style type="text/css">
	div.labor-detail-expanded{
		position: relative;
	}
	.dt-server td{
		vertical-align: middle;
	}
	.table td{
		vertical-align: top;
	}
</style>
@endsection

@section('content')
	<div class="card">
		<div class="card-header">
			<b>{!! Auth::user()->subModule() !!}</b>
			
			<div class="card-tools">
				
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
							<input type="hidden" class="form-control" value="" id="from">
							<input type="hidden" class="form-control" value="" id="to">
						</div>
					</div>
				</div>
				<div class="col-sm-3">
          <div class="form-group">
            {!! Html::decode(Form::label('patient_id', __('label.form.labor.patient'))) !!}
            {!! Form::select('patient_id', [], '', ['class' => 'form-control select2_pagination patient_id','placeholder' => __('label.form.choose')]) !!}
          </div>
				</div>
			</div>
			
			<table class="table table-bordered dt-server expandable-table" width="100%" id="labor_table">
				<thead>
					<tr>
						<th class="text-center" width="10%">{!! __('module.table.labor.labor_number') !!}</th>
						<th class="text-center" width="10%">{!! __('module.table.date') !!}</th>
						<th class="text-center" width="15%">{!! __('label.form.labor.price') !!}</th>
						<th class="text-center">{!! __('module.table.labor.pt_name') !!}</th>
						<th class="text-center" width="10%">{!! __('module.table.labor.pt_age') !!}</th>
						<th class="text-center" width="10%">{!! __('label.form.labor.pt_gender') !!}</th>
						<th class="text-center" width="10%">{!! __('module.table.labor.detail') !!}</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
				<tfoot>
					<tr>
						<th></th>
						<th class="text-right">{!! __('module.table.labor.total_patient') !!}</th>
						<th class="total_amount text-center"></th>
						<th class="total_patient"></th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>


	<div class="custom-loading-modal sr-only">
		<div class="custom-loader">
			<div class="sk-folding-cube">
				<div class="sk-cube1 sk-cube"></div>
				<div class="sk-cube2 sk-cube"></div>
				<div class="sk-cube4 sk-cube"></div>
				<div class="sk-cube3 sk-cube"></div>
			</div>
		</div>
	</div>

	<!-- New Invoice Item Modal -->
	<div class="modal add fade" id="detailModal">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">{{ __('alert.modal.title.detail') }}</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body modal_detail row">
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

@endsection

@section('js')
<script src="{{ asset('js/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('js/datatables/buttons.bootstrap.min.js') }}"></script>
	<script src="{{ asset('/js/daterangepicker.js') }}"></script>
	<script type="text/javascript">

		function getDetail(id) {
			$('.modal_detail').html($('#detail-'+id).html());
			$('#detailModal').modal();
		}

		$("#patient_id").change(function () {
				getDatatable($('#from').val(), $('#to').val(), $(this).val())
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

		

		$('#dateRangePicker').daterangepicker({
				ranges   : {
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
				getDatatable($('#from').val(), $('#to').val(), $('#patient_id').val())
			}
		)
		
		$('#from').val(moment().startOf('month').format('YYYY-MM-DD'));
		$('#to').val(moment().endOf('month').format('YYYY-MM-DD'));
		getDatatable($('#from').val(), $('#to').val(), $('#patient_id').val());

		$('#btn-search-filter').click(function () {
			if ($('#from').val()!='' && $('#to').val()!='') {
				getDatatable($('#from').val(), $('#to').val(), $('#patient_id').val())
			}
		});

		function getDatatable(from, to, pt_id) {
			$('.custom-loading-modal').removeClass('sr-only');
			$.ajax({
				url: "{{ route('labor.getReport') }}",
				method: 'post',
				data: {
					 from:from,
					 to:to,
					 pt_id:pt_id,
				},
				success: function(data){
					$('#labor_table').DataTable().destroy();

					$('#labor_table tbody').html(data.tbody);
					$('#labor_table .total_patient').html(data.total_patient);
					$('#labor_table .total_amount').html(data.total_amount);
					
					setTimeout(() => {
						$('#labor_table').DataTable({
							"language": (($('html').attr('lang')) ? datatableKH : {}),
							dom: 'Brtip',
							buttons: [
									'copyHtml5',
									'print',
									'excelHtml5',
									'csvHtml5',
									// 'pdfHtml5'
							],
							"initComplete": function(settings, json) {
								$('.custom-loading-modal').addClass('sr-only');
							},
							"fnDrawCallback": function (oSettings) {
								
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
									$(".btn-print-labor").on("click", function (e) {
										var myUrl = $(this).attr('data-url');
										e.preventDefault();
										openPrintWindow(myUrl, "to_print");
									});
								});

							},
						});
					}, 500);
				},
				error: function(){
					Swal.fire({
						icon: 'error',
						title: "{{ __('alert.swal.result.title.error') }}",
						confirmButtonText: "{{ __('alert.swal.button.yes') }}"
					})
				}
			});
		}
		
	</script>
@endsection