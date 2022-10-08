
  <div class="row">

    <div class="col-sm-9">
      <div class="form-group">
        {!! Html::decode(Form::label('name', __('label.form.name')." <small>*</small>")) !!}
        {!! Form::text('name', ((isset($permission->name))? $permission->name : '' ), ['class' => 'form-control '. (($errors->has("name"))? "is-invalid" : ""),'placeholder' => 'name','required']) !!}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
      </div>
    </div>
    {{-- / .col --}}

    @if (!isset($permission))
    <div class="col-sm-3">
      <div class="form-group text-center">
        {!! Html::decode(Form::label('crud', __('label.form.permission.crud'))) !!}
        <div class="togglebutton mt-1">
          <label>
            {!! Form::checkbox('crud', 0, false) !!}
            <span class="toggle toggle-success"></span>
          </label>
        </div>
      </div>
    </div>
    {{-- / .col --}}
    @endif

    <div class="col-sm-12">
      <div class="form-group">
        {!! Html::decode(Form::label('description', __('label.form.description'))) !!}
        {!! Form::textarea('description', ((isset($permission->description))? $permission->description : '' ), ['class' => 'form-control','rows' => '3','placeholder' => 'description']) !!}
      </div>
    </div>
    {{-- / .col --}}

  </div>
  {{-- / .row --}}
  