@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Fund Translation
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($fundTranslation, ['route' => ['fundTranslations.update', $fundTranslation->id], 'method' => 'patch']) !!}

                        @include('fund_translations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection