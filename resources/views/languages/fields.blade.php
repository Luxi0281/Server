<!-- Language Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('language_code', 'Language Code:') !!}
    {!! Form::text('language_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Language Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('language_name', 'Language Name:') !!}
    {!! Form::text('language_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('languages.index') !!}" class="btn btn-danger">Cancel</a>
</div>
