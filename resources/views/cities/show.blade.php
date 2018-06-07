@extends('layouts.app')

@section('content')
    <section class="content-header">
       <h1 class="text-center" style="font-size: 40px; font-weight: bold;">
		City Info
	   </h1>
    </section>
    <div class="content">
        <div class="box box-success">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('cities.show_fields')
                    <a href="{!! route('cities.index') !!}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection