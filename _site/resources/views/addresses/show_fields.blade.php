<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $address->id !!}</p>
</div>

<!-- Zip Code Field -->
<div class="form-group">
    {!! Form::label('zip_code', 'Zip Code:') !!}
    <p>{!! $address->zip_code !!}</p>
</div>

<!-- City Id Field -->
<div class="form-group">
    {!! Form::label('city_id', 'City Id:') !!}
    <p>{!! $address->city_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $address->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $address->updated_at !!}</p>
</div>

