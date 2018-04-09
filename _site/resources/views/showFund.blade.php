<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('other.head')
<body>
@include ('other.navigation')
<a href="{{url('/')}}" class = "btn btn-primary"><- Back </a>
<div class="container" style="padding-top: 100px;">
    <div class="text-center" style="padding: 15px 80px 30px 80px;">
        <img class="rounded-circle img-fluid d-block mx-auto" src="{!! $fund->logo !!}" alt="" width="250" height="250" style="border: 3px solid grey; margin-bottom: 15px; margin-top: 15px">
        <h1>{!! $fund->title !!}</h1><br>
        <h3>Description: </h3>
        <br>
        <p class = "text-center">{!! $fund->description !!}</p><br>
        <h3>Official Site Link: </h3>
        <a href="{!! $fund->link !!}">{!! $fund->link !!}</a>
    </div>
</div>
@include ('other.footer')
</body>
@include ('other.scripts')
</html>