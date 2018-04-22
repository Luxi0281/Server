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
        <img class="rounded-circle img-fluid d-block mx-auto" src="{!! $fund->picture !!}" alt="" width="250" height="250" style="border: 3px solid grey; margin-bottom: 15px; margin-top: 15px">
        <br>
        <h1>{!! $fund->title !!}</h1>
        <br>
        <h2>Official Site Link: </h2>
       <h3> <a href="{!! $fund->link !!}">{!! $fund->link !!}</a></h3>
        <br>
        <h2>Map Location: </h2>
        <br>
        <div id="map-container" class="z-depth-1" style="height: 500px; border-radius: 25px; border: 1px solid black"></div>
        <br>
        <h2>Description: </h2>
        <br>
        <p class = "text-center">{!! $fund->description !!}</p>
        <br>
        <h2>E-Mail: </h2>
        <p class = "text-center">{!! $fund->email !!}</p>
        <br>
        <h2>Phone Number: </h2>
        <p class = "text-center">{!! $fund->phone !!}</p>
        <br>
    </div>
</div>
@include ('other.modal')
@include ('other.footer')
</body>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{ URL::asset('js/faceScripts.js') }}" type="text/javascript"></script>
<script src="https://maps.google.com/maps/api/js"></script>
<script>
    function regular_map() {

        var latitude = {!! json_encode($fund->latitude) !!};
        var longitude = {!! json_encode($fund->longitude) !!};

        var var_location = new google.maps.LatLng(latitude, longitude);

        var var_mapoptions = {
            center: var_location,
            zoom: 14
        };

        var var_map = new google.maps.Map(document.getElementById("map-container"),
            var_mapoptions);

        var var_marker = new google.maps.Marker({
            position: var_location,
            map: var_map,
            title: "New York"
        });
    }
    // Initialize maps
    google.maps.event.addDomListener(window, 'load', regular_map);
</script>
</html>