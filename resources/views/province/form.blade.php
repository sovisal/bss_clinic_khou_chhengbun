
  <div class="row">

    <div class="col-sm-6">
      <div class="form-group">
        {!! Html::decode(Form::label('name_kh', __('label.form.name_kh')." <small>*</small>")) !!}
        {!! Form::text('name_kh', ((isset($province->_name_kh))? $province->_name_kh : '' ), ['class' => 'form-control '. (($errors->has("name_kh"))? "is-invalid" : ""),'placeholder' => 'kh name','required']) !!}
        {!! $errors->first('name_kh', '<div class="invalid-feedback">:message</div>') !!}
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        {!! Html::decode(Form::label('name_en', __('label.form.name_en')." <small>*</small>")) !!}
        {!! Form::text('name_en', ((isset($province->_name_en))? $province->_name_en : '' ), ['class' => 'form-control '. (($errors->has("name_en"))? "is-invalid" : ""),'placeholder' => 'en name','required']) !!}
        {!! $errors->first('name_en', '<div class="invalid-feedback">:message</div>') !!}
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        {!! Html::decode(Form::label('path_kh', __('label.form.path_kh')." <small>*</small>")) !!}
        {!! Form::text('path_kh', ((isset($province->_path_kh))? $province->_path_kh : '' ), ['class' => 'form-control '. (($errors->has("path_kh"))? "is-invalid" : ""),'placeholder' => 'kh full name path','required']) !!}
        {!! $errors->first('path_kh', '<div class="invalid-feedback">:message</div>') !!}
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        {!! Html::decode(Form::label('path_en', __('label.form.path_en')." <small>*</small>")) !!}
        {!! Form::text('path_en', ((isset($province->_path_en))? $province->_path_en : '' ), ['class' => 'form-control '. (($errors->has("path_en"))? "is-invalid" : ""),'placeholder' => 'en full name path','required']) !!}
        {!! $errors->first('path_en', '<div class="invalid-feedback">:message</div>') !!}
      </div>
    </div>
  </div>
  