@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Address Translation
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($addressTranslation, ['route' => ['addressTranslations.update', $addressTranslation->id], 'method' => 'patch']) !!}

                        @include('address_translations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection