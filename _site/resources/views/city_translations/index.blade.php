@extends('layouts.app')

@section('content')
    <section class="content-header">
		<h1 class = "pull-right">
			<a class="btn btn-success btn-lg block-center" href="{!! route('cityTranslations.create') !!}">Add New </a>
		</h1>
       <h1 class="text-center" style="font-size: 40px; font-weight: bold;">
	   City Translations
	   </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-success">
            <div class="box-body">
                    @include('city_translations.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

