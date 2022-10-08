<div class="row">
  <div class="col-sm-12">
    <div class="form-group">
      {!! Html::decode(Form::label('patient_id', __('label.form.invoice.patient'))) !!}
      {!! Form::select('patient_id', [], ((isset($pre_select_obj->patient_id))? $pre_select_obj->patient_id : '' ), ['class' => 'form-control select2_pagination patient_id','placeholder' => __('label.form.choose')]) !!}
    </div>
  </div>
  <div class="col-sm-8">
    <div class="form-group">
      {!! Html::decode(Form::label('pt_name', __('label.form.invoice.pt_name')." <small>*</small>")) !!}
      {!! Form::text('pt_name', ((isset($pre_select_obj->pt_name))? $pre_select_obj->pt_name : '' ), ['class' => 'form-control '. (($errors->has("pt_name"))? "is-invalid" : ""),'placeholder' => 'patient full name','required']) !!}
      {!! $errors->first('pt_name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
  </div>
  <div class="col-sm-4">
    <div class="form-group">
      {!! Html::decode(Form::label('pt_gender', __('label.form.invoice.pt_gender'))) !!}
      {!! Form::select('pt_gender', ['ប្រុស' => 'ប្រុស', 'ស្រី' => 'ស្រី'], ((isset($pre_select_obj->pt_gender))? $pre_select_obj->pt_gender : '' ), ['class' => 'form-control custom-select']) !!}
      {!! $errors->first('pt_gender', '<div class="invalid-feedback">:message</div>') !!}
    </div>
  </div>
  <div class="col-sm-3">
    <div class="form-group">
      {!! Html::decode(Form::label('pt_age', __('label.form.invoice.pt_age'))) !!}
      {!! Form::number('pt_age', ((isset($pre_select_obj->pt_age))? $pre_select_obj->pt_age : '' ), ['class' => 'form-control '. (($errors->has("pt_age"))? "is-invalid" : ""),'placeholder' => 'patient age']) !!}
      {!! $errors->first('pt_age', '<div class="invalid-feedback">:message</div>') !!}
    </div>
  </div>
  <div class="col-sm-3">
    <div class="form-group">
      {!! Html::decode(Form::label('pt_age_type', __('label.form.invoice.pt_age_type'))) !!}
      {!! Form::select('pt_age_type', ['1' => __('module.table.selection.age_type_1'), '2' => __('module.table.selection.age_type_2')], ($pre_select_obj->pt_age_type ?? '1'), ['class' => 'form-control custom-select']) !!}
      {!! $errors->first('pt_age_type', '<div class="invalid-feedback">:message</div>') !!}
    </div>
  </div>
  <div class="col-sm-6">
    <div class="form-group">
      {!! Html::decode(Form::label('pt_phone', __('label.form.invoice.pt_phone'))) !!}
      {!! Form::text('pt_phone', ((isset($pre_select_obj->pt_phone))? $pre_select_obj->pt_phone : '' ), ['class' => 'form-control '. (($errors->has("pt_phone"))? "is-invalid" : ""),'placeholder' => 'patient phone']) !!}
      {!! $errors->first('pt_phone', '<div class="invalid-feedback">:message</div>') !!}
    </div>
  </div>

<?php 
  $_4level_address = new \App\Http\Controllers\Location\FourLevelAddressController();
  $_4level_level = $_4level_address->BSSFullAddress($pre_select_obj->pt_address_code ?? 'xxxxxxxxxxxxxxx', 'array_selection');
  $_data_properties = ['class' => 'form-control select2', 'data-width'=>'100%', 'placeholder' => __('label.form.choose')];
?>
  <div class="col-sm-6">
    <div class="form-group">
      {!! Html::decode(Form::label('province_id', __('label.form.patient.province'))) !!}
      {!! Form::select('pt_province_id', $_4level_level[0][0], $_4level_level[0][1], $_data_properties) !!}
    </div>
  </div>
  <div class="col-sm-6">
    <div class="form-group">
      {!! Html::decode(Form::label('district_id', __('label.form.patient.district'))) !!}
      {!! Form::select('pt_district_id', $_4level_level[1][0], $_4level_level[1][1], $_data_properties) !!}
    </div>
  </div>

  <div class="col-sm-6">
    <div class="form-group">
      {!! Html::decode(Form::label('commune_id', __('label.form.patient.commune'))) !!}
      {!! Form::select('pt_commune_id', $_4level_level[2][0], $_4level_level[2][1], $_data_properties) !!}
    </div>
  </div>
  <div class="col-sm-6">
    <div class="form-group">
      {!! Html::decode(Form::label('village_id', __('label.form.patient.village'))) !!}
      {!! Form::select('pt_village_id', $_4level_level[3][0], $_4level_level[3][1], $_data_properties) !!}
    </div>
  </div>
  {{-- <div class="col-sm-12">
    <div class="form-group">
      {!! Html::decode(Form::label('pt_address', __('label.form.invoice.pt_address'))) !!}
      {!! Form::text('pt_address', ((isset($pre_select_obj->pt_address))? $pre_select_obj->pt_address : '' ), ['class' => 'form-control '. (($errors->has("pt_address"))? "is-invalid" : ""),'placeholder' => 'patient address']) !!}
      {!! $errors->first('pt_address', '<div class="invalid-feedback">:message</div>') !!}
    </div>
  </div> --}}
</div>
