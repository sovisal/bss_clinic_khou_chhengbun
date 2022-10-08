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
				@can('Province Create')
				<a href="{{route('province.create')}}" class="btn btn-success btn-flat btn-sm"><i class="fa fa-plus"></i> &nbsp;{{ __('label.buttons.create') }}</a>
				@endcan
			</div>

			<!-- Error Message -->
			@component('components.crud_alert')
			@endcomponent

		</div>
		@php
			$back_addr = substr_replace($addr, '', -2);
			$code_length = $addr ? strlen($addr) : 0;
		@endphp
		<div class="card-body">
			<table id="datatables" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>{!! __('module.table.no') !!}</th>
						<th>{{ __('module.table.name_kh') }} :: {{ __('module.table.name_en') }} ({{ $code_length == 2 ? __('label.form.patient.district') : ($code_length == 4 ? __('label.form.patient.commune') : ($code_length == 6 ? __('label.form.patient.village') : __('label.form.patient.province'))) }})</th>
						<th>
							{!! $code_length >=2 ? '<a href="?addr=' . $back_addr . '" class=""><i class="fa fa-undo"></i></a> -- ' : '' !!}
							{{ $code_length == 2 ? __('label.form.patient.commune') : ($code_length == 4 ? __('label.form.patient.village') : ($code_length == 6 ? '' : __('label.form.patient.district'))) }}
						</th>
						<th width="10%">{{ __('module.table.action') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($address as $i => $addr)
						<tr>
							<td class="text-center">{{ ++$i }}</td>
							<td>{{ $addr['_name_kh'] }} :: {{ $addr['_name_en'] }}</td>
							<td class="text-center">
								{!! ($code_length < 6) ? '<a href="?addr='. $addr['_code'] .'"><i class="fa fa-folder-open"></i>' : '--' !!}
								</a>
							</td>
							<td class="text-center">--</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

    <span class="sr-only" id="deleteAlert" data-title="{{ __('alert.swal.title.delete', ['name' => Auth::user()->module()]) }}" data-text="{{ __('alert.swal.text.unrevertible') }}" data-btnyes="{{ __('alert.swal.button.yes') }}" data-btnno="{{ __('alert.swal.button.no') }}" data-rstitle="{{ __('alert.swal.result.title.success') }}" data-rstext="{{ __('alert.swal.result.text.delete') }}"> Delete Message </span>

	</div>
@endsection

@section('js')
	<script type="text/javascript">

	</script>
@endsection
