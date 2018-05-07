@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Country Translation
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($countryTranslation, ['route' => ['countryTranslations.update', $countryTranslation->id], 'method' => 'patch']) !!}

                        @include('country_translations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection