@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            City Translation
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cityTranslation, ['route' => ['cityTranslations.update', $cityTranslation->id], 'method' => 'patch']) !!}

                        @include('city_translations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection