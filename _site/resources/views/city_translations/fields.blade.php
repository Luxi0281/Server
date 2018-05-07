<!-- City Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city_id', 'City Id:') !!}
    {!! Form::text('city_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Language Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('language_id', 'Language Id:') !!}
    {!! Form::text('language_id', null, ['class' => 'form-control']) !!}
</div>

<!-- City Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city_name', 'City Name:') !!}
    {!! Form::text('city_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cityTranslations.index') !!}" class="btn btn-default">Cancel</a>
</div>
