@extends('layouts.app')

@section('content')
    <section class="content-header">
       <h1 class="text-center" style="font-size: 40px; font-weight: bold;">
		Address Translation Creating
	   </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-success">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'addressTranslations.store']) !!}

                        @include('address_translations.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
