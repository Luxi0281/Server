<!-- Province Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('province_id', 'Province Id:') !!}
    {!! Form::text('province_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Language Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('language_id', 'Language Id:') !!}
    {!! Form::text('language_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Province Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('province_name', 'Province Name:') !!}
    {!! Form::text('province_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('provinceTranslations.index') !!}" class="btn btn-default">Cancel</a>
</div>
