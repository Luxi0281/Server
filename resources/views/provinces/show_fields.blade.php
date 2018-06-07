<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $province->id !!}</p>
</div>

<!-- Province Code Field -->
<div class="form-group">
    {!! Form::label('province_code', 'Province Code:') !!}
    <p>{!! $province->province_code !!}</p>
</div>

<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', 'Country Id:') !!}
    <p>{!! $province->country_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $province->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $province->updated_at !!}</p>
</div>

