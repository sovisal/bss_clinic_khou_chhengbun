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
				@can('Permission Create')
				<a href="{{route('district.create')}}" class="btn btn-success btn-flat btn-sm"><i class="fa fa-plus"></i> &nbsp;{{ __('label.buttons.create') }}</a>
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
	          <th width="5%">{!! __('module.table.no') !!}</th>
	          <th>{{ __('module.table.name_en') }}</th>
	          <th>{{ __('module.table.name_kh') }}</th>
	          <th>{{ __('module.table.district.code') }}</th>
	          <th>{{ __('module.table.district.province') }}</th>
	          <th width="10%">{{ __('module.table.action') }}</th>
	        </tr>
        </thead>
        <tbody>
        	@foreach($districts as $i => $district)
						<tr>
							<td class="text-center">{{ ++$i }}</td>
							<td>{{ $district->name_en }}</td>
							<td>{{ $district->name }}</td>
							<td>{{ $district->code }}</td>
							<td class="text-center"><b>{{ $district->province->name }}</b></td>
							<td class="text-right">

								@can('District Edit')
								{{-- Edit Button --}}
								<a href="{{ route('district.edit', $district->id) }}" class="btn btn-info btn-sm btn-flat"><i class="fa fa-pencil-alt"></i></a>
								@endcan

								@can('District Delete')
								{{-- Delete Button --}}
								<button class="btn btn-danger btn-sm btn-flat BtnDelete" value="{{ $district->id }}"><i class="fa fa-trash-alt"></i></button>
								{{ Form::open(['url'=>route('district.destroy', $district->id), 'id' => 'form-item-'.$district->id, 'class' => 'sr-only']) }}
								{{ Form::hidden('_method','DELETE') }}
								{{ Form::close() }}
								@endcan

							</td>
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

