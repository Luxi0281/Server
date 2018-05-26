<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('other.head')
<body>
@include ('other.navigation')

<div class="container" style="padding-top: 100px;">

    <div class="text-center" style="padding: 15px 80px 30px 80px;">
	@foreach ($fund as $fund)
        <img class="rounded-circle img-fluid d-block mx-auto" src="{!! $fund->picture !!}" alt="" width="250" height="250" style="border: 3px solid grey; margin-bottom: 15px; margin-top: 15px">
        <br>
        <h1>@lang('fund.fund')"{!! $fund->title !!}"</h1>
        <br>
        <h1>@lang('fund.link') </h1>
        <h3> <a href="{!! $fund->link !!}">{!! $fund->link !!}</a></h3>
        <br>
        <h1>@lang('fund.description')</h1>
        <br>
        <p class = "text-center">{!! $fund->description !!}</p>
        <br>
        <h1>@lang('fund.email')</h1>
        <p class = "text-center">{!! $fund->email !!}</p>
        <br>
        <h1>@lang('fund.phone')</h1>
        <p class = "text-center">{!! $fund->phone !!}</p>
        <br>
		<h1>@lang('fund.takesPlace') </h1>
        <p class = "text-center" style="font-size: 18px;">{!! $fund->country_name !!}, {!! $fund->province_name !!}, {!! $fund->city_name !!}</p>
        <br>
		<h1>@lang('fund.address')</h1>
        <p class = "text-center" style="font-size: 18px;"><u>{!! $fund->full_address !!}</u></p>
        <br>
        <h1>@lang('fund.mapLocation') </h1>
        <br>
        <div id="map-container" class="z-depth-1" style="height: 500px; border-radius: 25px; border: 1px solid black"></div>
		@endforeach
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