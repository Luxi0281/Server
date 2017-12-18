@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Funds
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($funds, ['route' => ['funds.update', $funds->id], 'method' => 'patch']) !!}

                        @include('funds.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection