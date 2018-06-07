<!doctype html>
<html lang="{{ strtolower(app()->getLocale()) }}">
@include('other.head')
<body>
@include('other.navigation')
<div class="container text-center navOffset">
    <img class = "animated pulse infinite center-block" src = "https://i.imgur.com/eCDsoeh.png" height="256" width="256">
    <h1 class = "text-center">{!! trans('welcome.welcomeTo') !!}<u>@lang('welcome.luxNash')</u>
        <br><small>@lang('welcome.nice2meet')</small>
    </h1>
    <img class = "center-block" src = "https://d30y9cdsu7xlg0.cloudfront.net/png/20191-200.png" height="96" width="96">
    <h2 class = "mb-3"><u>@lang('welcome.whatAreCharities')</u></h2>
    <p>@lang('welcome.p1')</p>
    <p>@lang('welcome.p2')</p>
    <p>@lang('welcome.p3')</p>
    <p class = "mb-3">@lang('welcome.p4')</p>
    <img class = "center-block mb-3" src = "https://i.imgur.com/K6XWLJQ.png" width="192" height="192">
    <h2 class = "text-center mb-5">@lang('welcome.suggesting')</h2>
	<div class = "text-center pt-2 pb-2">
    <div class="row">
        @foreach($fundsList as $fund)
		<div class="text-center wow animated bounceInUp col-lg-4 col-sm-6 col-md-6 col-sm-6 col-xs-12 text-center mb-5" style = "height: 550px;">
		<div class = "card highlight" style = "height: 550px;">
			<img class="fundBorder rotate rounded-circle img-fluid d-block mx-auto mb-3 mt-3" src="{{$fund->picture}}" alt="{{$fund->title}}" style="height: 200px!important; width: 200px!important;">
			<div class="card-body">
				<h5 class="card-title">{{$fund->title}}</h5>
				<p style="max-height: 145px; overflow: hidden; margin:0px;" class = "text-center card-text">{{$fund->description}}</p>
				<i class="fas fa-ellipsis-h mt-2" id = "ellipsis"></i>
			</div>
			<div class = "text-center mb-5">
				<a href="/foundation/{!! $fund->id !!}" class = "card-footer text-white success-color"><i class="fas fa-book-open pr-2"></i>{!! trans('welcome.click2Description') !!}<i class="fas fa-book-open pl-2"></i>	</a>
			</div>
		</div>
		</div>
        @endforeach
    </div>
</div>
</div>
@include('other.footer')
@include('other.modal')
@include('other.scripts')
</html>