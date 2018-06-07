<!-- Address Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address_id', 'Address Id:') !!}
    {!! Form::text('address_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Language Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('language_id', 'Language Id:') !!}
    {!! Form::text('language_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Full Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('full_address', 'Full Address:') !!}
    {!! Form::text('full_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('addressTranslations.index') !!}" class="btn btn-danger">Cancel</a>
</div>
