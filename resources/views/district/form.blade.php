
  <div class="row">

    <div class="col-sm-6">
      <div class="form-group">
        {!! Html::decode(Form::label('name', __('label.form.name')." <small>*</small>")) !!}
        {!! Form::text('name', ((isset($district->name))? $district->name : '' ), ['class' => 'form-control '. (($errors->has("name"))? "is-invalid" : ""),'placeholder' => 'name','required']) !!}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
      </div>
      <div class="form-group">
        {!! Html::decode(Form::label('name_en', __('label.form.name_en')." <small>*</small>")) !!}
        {!! Form::text('name_en', ((isset($district->name_en))? $district->name_en : '' ), ['class' => 'form-control '. (($errors->has("name_en"))? "is-invalid" : ""),'placeholder' => 'en name','required']) !!}
        {!! $errors->first('name_en', '<div class="invalid-feedback">:message</div>') !!}
      </div>
    </div>
    {{-- / .col --}}

    <div class="col-sm-6">
      <div class="form-group">
        {!! Html::decode(Form::label('code', __('label.form.district.code')." <small>*</small>")) !!}
        {!! Form::text('code', ((isset($district->code))? $district->code : '' ), ['class' => 'form-control '. (($errors->has("code"))? "is-invalid" : ""),'placeholder' => 'code','required']) !!}
        {!! $errors->first('code', '<div class="invalid-feedback">:message</div>') !!}
      </div>
      <div class="form-group">
        {!! Html::decode(Form::label('province_id', __('label.form.district.province')." <small>*</small>")) !!}
        {!! Form::select('province_id', $provinces, ((isset($district->province_id))? $district->province_id : '' ), ['class' => 'form-control select2','placeholder' => __('label.form.choose'),'required']) !!}
        {!! $errors->first('province_id', '<div class="invalid-feedback">:message</div>') !!}
      </div>
    </div>
    {{-- / .col --}}

  </div>
  {{-- / .row --}}