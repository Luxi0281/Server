<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $country->id !!}</p>
</div>

<!-- Country Code Field -->
<div class="form-group">
    {!! Form::label('country_code', 'Country Code:') !!}
    <p>{!! $country->country_code !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $country->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $country->updated_at !!}</p>
</div>

