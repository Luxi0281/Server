<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('other.head')
<body>
@include ('other.navigation')

<div class="container" style="padding-top: 100px;">
    <div class = "sideButtons">
        <div style="float: left">
            @if($previous)
            <a href = "{{URL::to('fund/'.$previous)}}}" class = "btn btn-primary text-center" style="color: white; font-size: 20px; padding: 15px;"> << Previous Fund </a>
                @endif
        </div>
        <div style="float: right">
            @if($next)
            <a href = "{{URL::to('fund/'.$next)}}}" class = "btn btn-primary text-center" style="color: white; font-size: 20px; padding: 15px;" >Next Fund >> </a>
                @endif
        </div>
    </div>
    <div class="text-center" style="padding: 15px 80px 30px 80px;">
        <img class="rounded-circle img-fluid d-block mx-auto" src="{!! $fund->logo !!}" alt="" width="250" height="250" style="border: 3px solid grey; margin-bottom: 15px; margin-top: 15px">
        <br>
        <h1>{!! $fund->title !!}</h1>
        <br>
        <h2>Official Site Link: </h2>
        <a href="{!! $fund->link !!}">{!! $fund->link !!}</a>
        <br>
        <br>
        <h2>Description: </h2>
        <br>
        <p class = "text-center">{!! $fund->description !!}</p><br>
    </div>
    <!--div class = "row ml-1 text-center m-5">
        <div class = "col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <a href = "{{URL::to('fund/'.$previous)}}}" class = "btn btn-primary" style="color: white">Previous Fund</a>
        </div>

        <div class = "col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <a href = "{{URL::to('fund/'.$next)}}}" class = "btn btn-primary" style="color: white">Next Fund</a>
        </div>
    </div-->
</div>
@include ('other.modal')
@include ('other.footer')
</body>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{ URL::asset('js/scripts.js') }}" type="text/javascript"></script>
</html>