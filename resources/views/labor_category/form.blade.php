
  <div class="row">

    <div class="col-sm-6">
      <div class="form-group">
        {!! Html::decode(Form::label('name', __('label.form.name')." <small>*</small>")) !!}
        {!! Form::text('name', ((isset($labor_category->name))? $labor_category->name : '' ), ['class' => 'form-control '. (($errors->has("name"))? "is-invalid" : ""),'placeholder' => 'name','required']) !!}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
      </div>
    </div>
    {{-- / .col --}}

    <div class="col-sm-6">
      <div class="form-group">
        {!! Html::decode(Form::label('description', __('label.form.description'))) !!}
        {!! Form::textarea('description', ((isset($labor_category->description))? $labor_category->description : '' ), ['class' => 'form-control','rows' => '3','placeholder' => 'description']) !!}
      </div>
    </div>
    {{-- / .col --}}

  </div>
  {{-- / .row --}}
  