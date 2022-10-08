@extends('layouts.app')

@section('css')
	<style class="text/css">

	</style>
@endsection

@section('content')

	<div class="card">
		<div class="card-header">
			<b>{!! Auth::user()->subModule() !!}</b>
			
			<div class="card-tools">

        {{-- Action Dropdown --}}
        @component('components.action')
          @slot('otherBTN')
            <a href="{{route('user.index')}}" class="dropdown-item text-danger"><i class="fa fa-arrow-left"></i> &nbsp;{{ __('label.buttons.back') }}</a>
          @endslot
				@endcomponent
				
				<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fas fa-minus"></i></button>
				{{-- <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove"><i class="fas fa-times"></i></button> --}}
			</div>

			<!-- Error Message -->
			@component('components.crud_alert')
			@endcomponent

		</div>


		{!! Form::open(['url' => route('user.update', [$user->id, 'resetPassowrd']),'method' => 'post','autocomplete'=>'off']) !!}
		{!! Form::hidden('_method', 'PUT') !!}

		<div class="card-body">
      
      <div class="form-group">
        {!! Html::decode(Form::label('email', __('label.form.user.email'))) !!}
        {!! Form::email('email', $user->email, ['class' => 'form-control '. (($errors->has("email"))? "is-invalid" : ""),'placeholder' => 'email','readonly']) !!}
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            {!! Html::decode(Form::label('password', __('label.form.user.password') .'<small>*</small>')) !!}
            {!! Form::password('password',['class' => 'form-control '. (($errors->has("password"))? "is-invalid" : ""),'placeholder' => 'password','autocomplete' => 'new-password', 'required']) !!}
            {!! $errors->first('password', '<span class="invalid-feedback">:message</span>') !!}
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            {!! Html::decode(Form::label('password_confirmation', __('label.form.user.confirm_password') .'<small>*</small>')) !!}
            {!! Form::password('password_confirmation',['class' => 'form-control '. (($errors->has("password_confirmation"))? "is-invalid" : ""),'placeholder' => 'confirm-password','autocomplete' => 'new-password', 'required']) !!}
            {!! $errors->first('password_confirmation', '<span class="invalid-feedback">:message</span>') !!}
          </div>
        </div>
      </div>
      
		</div>
		<!-- ./card-body -->
		
		<div class="card-footer text-muted text-center">
			@include('components.submit')
		</div>
		<!-- ./card-Footer -->
		{{ Form::close() }}

	</div>
@endsection

@section('js')
	<script type="text/javascript">

	</script>
@endsection