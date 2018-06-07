@extends('layouts.app')

@section('content')
    <section class="content-header">
       <h1 class="text-center" style="font-size: 40px; font-weight: bold;">
		Address Creating
	   </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-success">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'addresses.store']) !!}

                        @include('addresses.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
