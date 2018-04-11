@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Funds
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('funds.show_fields')
                    <a href="{!! route('funds.index') !!}" class="btn btn-default">Back</a>
                    <a href="{!! url('api/funds/'.$funds->id) !!}" class = "btn btn-success">Show JSON</a>
                </div>
            </div>
        </div>
    </div>
@endsection
