<div class="modal fade" id="modal_confirm_delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">{{ __('alert.modal.title.password_confirm') }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::hidden('item_id','', ['id' => 'item_id']) !!}
	      <div class="form-group {!! (($errors->has('password'))? 'has-error':'') !!}">
	        {!! Html::decode(Form::label('password', __('alert.modal.form.password_confirm'))) !!}
	        {!! Form::password('password_confirm', ['class' => 'form-control','placeholder' => 'password','id' => 'password_confirm','autocomplete' => 'off','required']) !!}
	      </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">{{ __('alert.swal.button.no') }}</button>
        <button type="button" class="btn btn-flat btn btn-success submit_confirm_password" data-dismiss="modal">{{ __('alert.swal.button.yes') }}</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<input type="email" class="sr-only for-browser-remember-password" id="email" />
