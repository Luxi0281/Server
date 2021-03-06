@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="text-center" style="font-size: 40px; font-weight: bold;">Funds</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('funds.table')
            </div>
        </div>
        <div class="text-center">
            <a class="btn btn-primary actionButton" href="{!! route('funds.create') !!}">Add New</a>
            <a class="btn btn-success actionButton" href="{!! url('api/funds') !!}">Show JSON</a>
            <a class="btn btn-warning" style="width: 300px; padding: 25px; font-size: 24px; font-weight: bold">Download JSON</a>
        </div>
    </div>
@endsection

