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
				@can('Role Create')
				<a href="{{route('role.create')}}" class="btn btn-success btn-flat btn-sm"><i class="fa fa-plus"></i> &nbsp;{{ __('label.buttons.create') }}</a>
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
	          <th width="10%">{{ __('module.table.role.user') }}</th>
	          <th width="10%">{{ __('module.table.action') }}</th>
	        </tr>
        </thead>
        <tbody>
        	@foreach($roles as $i => $role)
						<tr>
							<td class="text-center">{{ ++$i }}</td>
							<td>{{ $role->name }}</td>
							<td>{{ $role->description }}</td>
							<td class="text-center"><span class="badge badge-secondary">{{ $role->users->count() }}</span></td>
							<td class="text-right">

								@can('Role Assign Permission')
								{{-- Assign Permission Button --}}
								<a href="{{ route('role.assign_permission', $role->id) }}" class="btn btn-primary btn-sm btn-flat" data-toggle="tooltip" data-placement="left" title="{{ __('label.buttons.assign') }}"><i class="fa fa-user-tag"></i></a>
								@endcan

								@can('Role Edit')
								{{-- Edit Button --}}
								<a href="{{ route('role.edit',$role->id) }}" class="btn btn-info btn-sm btn-flat" data-toggle="tooltip" data-placement="left" title="{{ __('label.buttons.edit') }}"><i class="fa fa-pencil-alt"></i></a>
								@endcan

								@can('Role Delete')
								{{-- Delete Button --}}
								@if( $role->id > 3 )
									<button class="btn btn-danger btn-sm btn-flat BtnDelete" value="{{ $role->id }}" data-toggle="tooltip" data-placement="left" title="{{ __('label.buttons.delete') }}"><i class="fa fa-trash-alt"></i></button>
									{{ Form::open(['url'=>route('role.destroy', $role->id), 'id' => 'form-item-'.$role->id, 'class' => 'sr-only']) }}
									{{ Form::hidden('_method','DELETE') }}
									{{ Form::close() }}
								@endif
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