
  <div class="row">

    <div class="col-sm-6">
      <div class="form-group">
        {!! Html::decode(Form::label('name', __('label.form.name')." <small>*</small>")) !!}
        {!! Form::text('name', ((isset($province->name))? $province->name : '' ), ['class' => 'form-control '. (($errors->has("name"))? "is-invalid" : ""),'placeholder' => 'name','required']) !!}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
      </div>
    </div>
    {{-- / .col --}}

    <div class="col-sm-6">
      <div class="form-group">
        {!! Html::decode(Form::label('name_en', __('label.form.name_en')." <small>*</small>")) !!}
        {!! Form::text('name_en', ((isset($province->name_en))? $province->name_en : '' ), ['class' => 'form-control '. (($errors->has("name_en"))? "is-invalid" : ""),'placeholder' => 'en name','required']) !!}
        {!! $errors->first('name_en', '<div class="invalid-feedback">:message</div>') !!}
      </div>
    </div>
    {{-- / .col --}}

  </div>
  {{-- / .row --}}
  