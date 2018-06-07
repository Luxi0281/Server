<!-- Province Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('province_code', 'Province Code:') !!}
    {!! Form::text('province_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_id', 'Country Id:') !!}
    {!! Form::text('country_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('provinces.index') !!}" class="btn btn-danger">Cancel</a>
</div>
