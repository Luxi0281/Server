<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('other.head')
<body>
@include('other.navigation')
</div>
<div class="container text-center" style = "padding-top: 90px;">
    <img class = "center-block" src = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsK2HjJxn45b6nB1qe__xmZHoh0_8TU-S08q7XMBgq5d95noVvFg" height="256" width="256">
    <h1 class = "text-center">@lang('welcome.welcomeTo')<u>@lang('welcome.luxNash')</u>  <br>
        <small>@lang('welcome.nice2meet')</small>
    </h1>
    <img class = "center-block" src = "https://d30y9cdsu7xlg0.cloudfront.net/png/20191-200.png" height="96" width="96">
    <h2><u>@lang('welcome.whatAreCharities')</u></h2> <br>
    <p>@lang('welcome.p1')</p>
    <p>@lang('welcome.p2')</p>
    <p>@lang('welcome.p3')</p>
    <p>@lang('welcome.p4')</p>
    <br>
    <br>
    <img class = "center-block" src = "https://www.charitableevolution.com/wp-content/uploads/2017/04/Logo_LighBlue_Medium-Rotation.gif"><br> <br>
    <h2 class = "text-center">@lang('welcome.suggesting')</h2>
	<br>
	<div class = "container text-center" style="padding-top: 10px; padding-bottom: 10px;">
	<br><br>
    <div class="row">
        @foreach($fundsList as $fund)
        <div data-wow-delay="0.5s" class="wow animated bounceInUp col-lg-4 col-sm-6 col-md-6 col-sm-12 col-xs-12 text-center mb-4" id="fundDiv">
            <div class="border" style = "margin: 5px; padding: 5px;">
            <img class="rounded-circle img-fluid d-block mx-auto" src="{{$fund->picture}}" alt="" width="150" height="150" style="border: 2px solid grey; margin-bottom: 15px; margin-top: 15px">
            <h3>
			{{$fund->title}}
			</h3>
            <p style="max-height: 145px; overflow: hidden; position: relative; margin: 0px;" class = "text-center">
			{{$fund->description}}
			</p>
			<p style = "padding: 0px; margin: 0px">...</p>
			<a class="btn btn-primary" href="/fund/{!! $fund->id !!}" style="margin: 15px" style=""> {!! trans('welcome.click2Description') !!}</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
@include('other.footer')
@include('other.modal')
</body>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{ URL::asset('js/faceScripts.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('wowJS/dist/wow.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/country-dropdown/js/jquery/jquery-1.8.2.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/country-dropdown/js/msdropdown/jquery.dd.min.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $("#locale").msDropdown();
    })
</script>

</html>
