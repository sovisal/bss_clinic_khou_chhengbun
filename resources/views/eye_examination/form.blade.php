<div class="row">
	<div class="col-sm-6">
		<div class="row">
			<div class="{{ (isset($eye_examination->id)? 'col-sm-6' : 'col-sm-12') }}">
				<div class="form-group">
					{!! Form::hidden('date_hidden', '',) !!}
					{!! Html::decode(Form::label('date', __('label.form.date')."(YYYY-MM-DD) <small>*</small>")) !!}
					{!! Form::text('date', ((isset($eye_examination->date))? $eye_examination->date : date('Y-m-d') ), ['class' => 'form-control datetimepicker-input '. (($errors->has("date"))? "is-invalid" : ""), 'id' => 'date_picker', 'data-toggle' => 'datetimepicker', 'data-target' => '#date_picker', 'placeholder' => 'date', 'autocomplete' => 'off', 'required']) !!}
					{!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
				</div>
			</div>
			@if (isset($eye_examination->id))
				<div class="col-sm-6">
					<div class="form-group">
						{!! Html::decode(Form::label('ee_number', __('label.form.eye_examination.ee_number'))) !!}
						{!! Form::text('ee_number', ((isset($eye_examination->id))? str_pad($eye_examination->id, 6, '0', STR_PAD_LEFT) : '' ), ['class' => 'form-control'. (($errors->has("ee_number"))? "is-invalid" : ""), 'autocomplete' => 'off', 'disabled' => 'disabled']) !!}
					</div>
				</div>
			@endif

			<div class="col-sm-12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th width="25%"></th>
							<th class="bg-light-gray">VARE</th>
							<th class="bg-light-gray">VALE</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-right bg-light-gray">{!! Html::decode(Form::label('initial_iop_re', __('label.form.eye_examination.plain_eye'))) !!}</td>
							<td>
								{!! Form::select('plain_eye_vare', $eye_sign_range, ($eye_examination->plain_eye_vare ?? ''), ['class' => 'form-control custom-select']) !!}
							</td>
							<td>
								{!! Form::select('plain_eye_vale', $eye_sign_range, ($eye_examination->plain_eye_vale ?? ''), ['class' => 'form-control custom-select']) !!}
							</td>
						</tr>
						<tr>
							<td class="text-right bg-light-gray">{!! Html::decode(Form::label('initial_iop_re', __('label.form.eye_examination.with_ph'))) !!}</td>
							<td>
								{!! Form::select('with_ph_vare', $eye_sign_range, ($eye_examination->with_ph_vare ?? ''), ['class' => 'form-control custom-select']) !!}
							</td>
							<td>
								{!! Form::select('with_ph_vale', $eye_sign_range, ($eye_examination->with_ph_vale ?? ''), ['class' => 'form-control custom-select']) !!}
							</td>
						</tr>
						<tr>
							<td class="text-right bg-light-gray">{!! Html::decode(Form::label('initial_iop_re', __('label.form.eye_examination.with_glasses'))) !!}</td>
							<td>
								{!! Form::select('with_glasses_vare', $eye_sign_range, ($eye_examination->with_glasses_vare ?? ''), ['class' => 'form-control custom-select']) !!}
							</td>
							<td>
								{!! Form::select('with_glasses_vale', $eye_sign_range, ($eye_examination->with_glasses_vale ?? ''), ['class' => 'form-control custom-select']) !!}
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="col-sm-12">
				<table class="table table-bordered table-form">
					<thead>
						<tr>
							<th width="25%"></th>
							<th class="bg-light-gray">Right Eye</th>
							<th class="bg-light-gray">Left Eye</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-right bg-light-gray">{!! Html::decode(Form::label('initial_iop_re', __('label.form.eye_examination.initial_iop'))) !!}</td>
							<td>
								{!! Form::text('initial_iop_re', ((isset($pre_select_obj->initial_iop_re))? $pre_select_obj->initial_iop_re : '' ), ['class' => 'form-control '. (($errors->has("initial_iop_re"))? "is-invalid" : "")]) !!}
								{!! $errors->first('initial_iop_re', '<div class="invalid-feedback">:message</div>') !!}
							</td>
							<td>
								{!! Form::text('initial_iop_le', ((isset($pre_select_obj->initial_iop_le))? $pre_select_obj->initial_iop_le : '' ), ['class' => 'form-control '. (($errors->has("initial_iop_le"))? "is-invalid" : "")]) !!}
								{!! $errors->first('initial_iop_le', '<div class="invalid-feedback">:message</div>') !!}
							</td>
						</tr>

						<tr>
							<td class="text-right bg-light-gray">{!! Html::decode(Form::label('primary_diagnosis_re', __('label.form.eye_examination.primary_diagnosis'))) !!}</td>
							<td>
								{!! Form::text('primary_diagnosis_re', ((isset($pre_select_obj->primary_diagnosis_re))? $pre_select_obj->primary_diagnosis_re : '' ), ['class' => 'form-control '. (($errors->has("primary_diagnosis_re"))? "is-invalid" : "")]) !!}
								{!! $errors->first('primary_diagnosis_re', '<div class="invalid-feedback">:message</div>') !!}
							</td>
							<td>
								{!! Form::text('primary_diagnosis_le', ((isset($pre_select_obj->primary_diagnosis_le))? $pre_select_obj->primary_diagnosis_le : '' ), ['class' => 'form-control '. (($errors->has("primary_diagnosis_le"))? "is-invalid" : "")]) !!}
								{!! $errors->first('primary_diagnosis_le', '<div class="invalid-feedback">:message</div>') !!}
							</td>
						</tr>
						
						<tr>
							<td class="text-right bg-light-gray">{!! Html::decode(Form::label('orbit_re', __('label.form.eye_examination.orbit'))) !!}</td>
							<td>
								{!! Form::text('orbit_re', ((isset($pre_select_obj->orbit_re))? $pre_select_obj->orbit_re : '' ), ['class' => 'form-control '. (($errors->has("orbit_re"))? "is-invalid" : "")]) !!}
								{!! $errors->first('orbit_re', '<div class="invalid-feedback">:message</div>') !!}
							</td>
							<td>
								{!! Form::text('orbit_le', ((isset($pre_select_obj->orbit_le))? $pre_select_obj->orbit_le : '' ), ['class' => 'form-control '. (($errors->has("orbit_le"))? "is-invalid" : "")]) !!}
								{!! $errors->first('orbit_le', '<div class="invalid-feedback">:message</div>') !!}
							</td>
						</tr>

						<tr>
							<td class="text-right bg-light-gray">{!! Html::decode(Form::label('ocular_movem_re', __('label.form.eye_examination.ocular_movem'))) !!}</td>
							<td>
								{!! Form::text('ocular_movem_re', ((isset($pre_select_obj->ocular_movem_re))? $pre_select_obj->ocular_movem_re : '' ), ['class' => 'form-control '. (($errors->has("ocular_movem_re"))? "is-invalid" : "")]) !!}
								{!! $errors->first('ocular_movem_re', '<div class="invalid-feedback">:message</div>') !!}
							</td>
							<td>
								{!! Form::text('ocular_movem_le', ((isset($pre_select_obj->ocular_movem_le))? $pre_select_obj->ocular_movem_le : '' ), ['class' => 'form-control '. (($errors->has("ocular_movem_le"))? "is-invalid" : "")]) !!}
								{!! $errors->first('ocular_movem_le', '<div class="invalid-feedback">:message</div>') !!}
							</td>
						</tr>

						<tr>
							<td class="text-right bg-light-gray">{!! Html::decode(Form::label('eyelid_las_re', __('label.form.eye_examination.eyelid_las'))) !!}</td>
							<td>
								{!! Form::text('eyelid_las_re', ((isset($pre_select_obj->eyelid_las_re))? $pre_select_obj->eyelid_las_re : '' ), ['class' => 'form-control '. (($errors->has("eyelid_las_re"))? "is-invalid" : "")]) !!}
								{!! $errors->first('eyelid_las_re', '<div class="invalid-feedback">:message</div>') !!}
							</td>
							<td>
								{!! Form::text('eyelid_las_le', ((isset($pre_select_obj->eyelid_las_le))? $pre_select_obj->eyelid_las_le : '' ), ['class' => 'form-control '. (($errors->has("eyelid_las_le"))? "is-invalid" : "")]) !!}
								{!! $errors->first('eyelid_las_le', '<div class="invalid-feedback">:message</div>') !!}
							</td>
						</tr>

						<tr>
							<td class="text-right bg-light-gray">{!! Html::decode(Form::label('conjunctiva_re', __('label.form.eye_examination.conjunctiva'))) !!}</td>
							<td>
								{!! Form::text('conjunctiva_re', ((isset($pre_select_obj->conjunctiva_re))? $pre_select_obj->conjunctiva_re : '' ), ['class' => 'form-control '. (($errors->has("conjunctiva_re"))? "is-invalid" : "")]) !!}
								{!! $errors->first('conjunctiva_re', '<div class="invalid-feedback">:message</div>') !!}
							</td>
							<td>
								{!! Form::text('conjunctiva_le', ((isset($pre_select_obj->conjunctiva_le))? $pre_select_obj->conjunctiva_le : '' ), ['class' => 'form-control '. (($errors->has("conjunctiva_le"))? "is-invalid" : "")]) !!}
								{!! $errors->first('conjunctiva_le', '<div class="invalid-feedback">:message</div>') !!}
							</td>
						</tr>

						<tr>
							<td class="text-right bg-light-gray">{!! Html::decode(Form::label('cornea_re', __('label.form.eye_examination.cornea'))) !!}</td>
							<td>
								{!! Form::text('cornea_re', ((isset($pre_select_obj->cornea_re))? $pre_select_obj->cornea_re : '' ), ['class' => 'form-control '. (($errors->has("cornea_re"))? "is-invalid" : "")]) !!}
								{!! $errors->first('cornea_re', '<div class="invalid-feedback">:message</div>') !!}
							</td>
							<td>
								{!! Form::text('cornea_le', ((isset($pre_select_obj->cornea_le))? $pre_select_obj->cornea_le : '' ), ['class' => 'form-control '. (($errors->has("cornea_le"))? "is-invalid" : "")]) !!}
								{!! $errors->first('cornea_le', '<div class="invalid-feedback">:message</div>') !!}
							</td>
						</tr>

						<tr>
							<td class="text-right bg-light-gray">{!! Html::decode(Form::label('ac_re', __('label.form.eye_examination.ac'))) !!}</td>
							<td>
								{!! Form::text('ac_re', ((isset($pre_select_obj->ac_re))? $pre_select_obj->ac_re : '' ), ['class' => 'form-control '. (($errors->has("ac_re"))? "is-invalid" : "")]) !!}
								{!! $errors->first('ac_re', '<div class="invalid-feedback">:message</div>') !!}
							</td>
							<td>
								{!! Form::text('ac_le', ((isset($pre_select_obj->ac_le))? $pre_select_obj->ac_le : '' ), ['class' => 'form-control '. (($errors->has("ac_le"))? "is-invalid" : "")]) !!}
								{!! $errors->first('ac_le', '<div class="invalid-feedback">:message</div>') !!}
							</td>
						</tr>

						<tr>
							<td class="text-right bg-light-gray">{!! Html::decode(Form::label('lris_pupil_re', __('label.form.eye_examination.lris_pupil'))) !!}</td>
							<td>
								{!! Form::text('lris_pupil_re', ((isset($pre_select_obj->lris_pupil_re))? $pre_select_obj->lris_pupil_re : '' ), ['class' => 'form-control '. (($errors->has("lris_pupil_re"))? "is-invalid" : "")]) !!}
								{!! $errors->first('lris_pupil_re', '<div class="invalid-feedback">:message</div>') !!}
							</td>
							<td>
								{!! Form::text('lris_pupil_le', ((isset($pre_select_obj->lris_pupil_le))? $pre_select_obj->lris_pupil_le : '' ), ['class' => 'form-control '. (($errors->has("lris_pupil_le"))? "is-invalid" : "")]) !!}
								{!! $errors->first('lris_pupil_le', '<div class="invalid-feedback">:message</div>') !!}
							</td>
						</tr>

						<tr>
							<td class="text-right bg-light-gray">{!! Html::decode(Form::label('lens_re', __('label.form.eye_examination.lens'))) !!}</td>
							<td>
								{!! Form::text('lens_re', ((isset($pre_select_obj->lens_re))? $pre_select_obj->lens_re : '' ), ['class' => 'form-control '. (($errors->has("lens_re"))? "is-invalid" : "")]) !!}
								{!! $errors->first('lens_re', '<div class="invalid-feedback">:message</div>') !!}
							</td>
							<td>
								{!! Form::text('lens_le', ((isset($pre_select_obj->lens_le))? $pre_select_obj->lens_le : '' ), ['class' => 'form-control '. (($errors->has("lens_le"))? "is-invalid" : "")]) !!}
								{!! $errors->first('orbit_le', '<div class="invalid-feedback">:message</div>') !!}
							</td>
						</tr>

						<tr>
							<td class="text-right bg-light-gray">{!! Html::decode(Form::label('retinal_reflex_re', __('label.form.eye_examination.retinal_reflex'))) !!}</td>
							<td>
								{!! Form::text('retinal_reflex_re', ((isset($pre_select_obj->retinal_reflex_re))? $pre_select_obj->retinal_reflex_re : '' ), ['class' => 'form-control '. (($errors->has("retinal_reflex_re"))? "is-invalid" : "")]) !!}
								{!! $errors->first('retinal_reflex_re', '<div class="invalid-feedback">:message</div>') !!}
							</td>
							<td>
								{!! Form::text('retinal_reflex_le', ((isset($pre_select_obj->retinal_reflex_le))? $pre_select_obj->retinal_reflex_le : '' ), ['class' => 'form-control '. (($errors->has("retinal_reflex_le"))? "is-invalid" : "")]) !!}
								{!! $errors->first('retinal_reflex_le', '<div class="invalid-feedback">:message</div>') !!}
							</td>
						</tr>

					</tbody>
				</table>
			</div>

		</div>



	</div>
	<div class="col-sm-6">
		@include('components.patient_form', ['pre_select_obj' => $pre_select_obj ?? null])

		<table class="table table-bordered table-form">
			<thead>
				<tr>
					<th width="25%"></th>
					<th class="bg-light-gray">Right Eye</th>
					<th class="bg-light-gray">Left Eye</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="text-right bg-light-gray">{!! Html::decode(Form::label('image_uper_lide_re', __('label.form.eye_examination.image_uper_lide'))) !!}</td>
					<td class="text-center">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new img-thumbnail" style="max-width: 100%;">
								<img data-src="" src="{{ asset('images/eye_examinations/' . ((isset($eye_examination->image_uper_lide_re))? $eye_examination->image_uper_lide_re : 'default.png' )) }}" alt="...">
							</div>
							<div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 248px;"></div>
							<div class="mt-2">
								<span class="btn btn-xs btn-outline-secondary btn-file">
									<span class="fileinput-new">{{ __('label.buttons.select') }}</span>
									<span class="fileinput-exists">{{ __('label.buttons.change') }}</span>
									<input type="file" name="image_uper_lide_re" />
								</span>
								<a href="#" class="btn btn-xs btn-outline-secondary fileinput-exists" data-dismiss="fileinput">{{ __('label.buttons.remove') }}</a>
							</div>
						</div>
					</td>
					<td class="text-center">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new img-thumbnail" style="max-width: 100%;">
								<img data-src="" src="{{ asset('images/eye_examinations/' . ((isset($eye_examination->image_uper_lide_le))? $eye_examination->image_uper_lide_le : 'default.png' )) }}" alt="...">
							</div>
							<div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 248px;"></div>
							<div class="mt-2">
								<span class="btn btn-xs btn-outline-secondary btn-file">
									<span class="fileinput-new">{{ __('label.buttons.select') }}</span>
									<span class="fileinput-exists">{{ __('label.buttons.change') }}</span>
									<input type="file" name="image_uper_lide_le" />
								</span>
								<a href="#" class="btn btn-xs btn-outline-secondary fileinput-exists" data-dismiss="fileinput">{{ __('label.buttons.remove') }}</a>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td class="text-right bg-light-gray">{!! Html::decode(Form::label('image_eye_boll_re', __('label.form.eye_examination.image_eye_boll'))) !!}</td>
					<td class="text-center">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new img-thumbnail" style="max-width: 100%;">
								<img data-src="" src="{{ asset('images/eye_examinations/' . ((isset($eye_examination->image_eye_boll_re))? $eye_examination->image_eye_boll_re : 'default.png' )) }}" alt="...">
							</div>
							<div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 248px;"></div>
							<div class="mt-2">
								<span class="btn btn-xs btn-outline-secondary btn-file">
									<span class="fileinput-new">{{ __('label.buttons.select') }}</span>
									<span class="fileinput-exists">{{ __('label.buttons.change') }}</span>
									<input type="file" name="image_eye_boll_re" />
								</span>
								<a href="#" class="btn btn-xs btn-outline-secondary fileinput-exists" data-dismiss="fileinput">{{ __('label.buttons.remove') }}</a>
							</div>
						</div>
					</td>
					<td class="text-center">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new img-thumbnail" style="max-width: 100%;">
								<img data-src="" src="{{ asset('images/eye_examinations/' . ((isset($eye_examination->image_eye_boll_le))? $eye_examination->image_eye_boll_le : 'default.png' )) }}" alt="...">
							</div>
							<div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 248px;"></div>
							<div class="mt-2">
								<span class="btn btn-xs btn-outline-secondary btn-file">
									<span class="fileinput-new">{{ __('label.buttons.select') }}</span>
									<span class="fileinput-exists">{{ __('label.buttons.change') }}</span>
									<input type="file" name="image_eye_boll_le" />
								</span>
								<a href="#" class="btn btn-xs btn-outline-secondary fileinput-exists" data-dismiss="fileinput">{{ __('label.buttons.remove') }}</a>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td class="text-right bg-light-gray">{!! Html::decode(Form::label('image_locver_lide_re', __('label.form.eye_examination.image_locver_lide'))) !!}</td>
					<td class="text-center">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new img-thumbnail" style="max-width: 100%;">
								<img data-src="" src="{{ asset('images/eye_examinations/' . ((isset($eye_examination->image_locver_lide_re))? $eye_examination->image_locver_lide_re : 'default.png' )) }}" alt="...">
							</div>
							<div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 248px;"></div>
							<div class="mt-2">
								<span class="btn btn-xs btn-outline-secondary btn-file">
									<span class="fileinput-new">{{ __('label.buttons.select') }}</span>
									<span class="fileinput-exists">{{ __('label.buttons.change') }}</span>
									<input type="file" name="image_locver_lide_re" />
								</span>
								<a href="#" class="btn btn-xs btn-outline-secondary fileinput-exists" data-dismiss="fileinput">{{ __('label.buttons.remove') }}</a>
							</div>
						</div>
					</td>
					<td class="text-center">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new img-thumbnail" style="max-width: 100%;">
								<img data-src="" src="{{ asset('images/eye_examinations/' . ((isset($eye_examination->image_locver_lide_le))? $eye_examination->image_locver_lide_le : 'default.png' )) }}" alt="...">
							</div>
							<div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 248px;"></div>
							<div class="mt-2">
								<span class="btn btn-xs btn-outline-secondary btn-file">
									<span class="fileinput-new">{{ __('label.buttons.select') }}</span>
									<span class="fileinput-exists">{{ __('label.buttons.change') }}</span>
									<input type="file" name="image_locver_lide_le" />
								</span>
								<a href="#" class="btn btn-xs btn-outline-secondary fileinput-exists" data-dismiss="fileinput">{{ __('label.buttons.remove') }}</a>
							</div>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
