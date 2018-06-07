<!-- Picture Field -->
<div class="form-group col-sm-6">
    {!! Form::label('picture', 'Picture:') !!}
    {!! Form::text('picture', null, ['class' => 'form-control']) !!}
</div>

<!-- Link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('link', 'Link:') !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Location Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location_id', 'Location Id:') !!}
    {!! Form::text('location_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('funds.index') !!}" class="btn btn-danger">Cancel</a>
</div>
