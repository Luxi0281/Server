@extends('layouts.app')

@section('content')
    <section class="content-header">
		<h1 class = "pull-right">
			<a class="btn btn-success btn-lg block-center" href="{!! route('languages.create') !!}">Add New </a>
		</h1>
       <h1 class="text-center" style="font-size: 40px; font-weight: bold;">
	   Languages
	   </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
		
        @if(Session::has('message'))
		<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check text-white"></i> Success!</h4>
                {{ Session::get('message') }}
		</div>
		@endif

        <div class="clearfix"></div>
        <div class="box box-success">
            <div class="box-body">
                    @include('languages.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

