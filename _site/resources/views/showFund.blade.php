<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('other.head')
<body>
@include ('other.navigation')
    <div class="container pt-5">
	    @foreach ($fund as $fund)
      <div class="py-5 text-center">
        <img class="wow animated rollIn rounded-circle img-fluid d-block mx-auto mb-3 mt-3" id = "fundPic" src="{!! $fund->picture !!}" alt="{!! $fund->title !!}" >
        <h1>@lang('fund.fund')"{!! $fund->title !!}"</h1>
		<br>
		<img class = "img-fluid d-block mx-auto" src = "https://cdn4.iconfinder.com/data/icons/small-n-flat/24/notepad-512.png" width="48" height="48">
		<h4>@lang('fund.about')</h4>
        <p class="lead">{!! $fund->description !!}</p>
		<img class = "fastRotate img-fluid d-block mx-auto rotate" src = "http://www.iconhot.com/icon/png/vista-icons-png/256/vista-16.png" width="48" height="48">
		<h4>@lang('fund.link')</h4>
		<a href="{!! $fund->link !!}">{!! $fund->link !!}</a>
      </div>
      <div class="row">
        <div class="col-md-8 order-md-1">
		<img class = "img-fluid d-block mx-auto" src = "http://www.clker.com/cliparts/B/r/u/H/w/O/information-icon-hi.png" width="48" height="48" style="padding: 5px;">
          <h4 class="justify-content-between align-items-center mb-3 text-center">@lang('fund.info')</h4>
			<table class="table table-hover table-bordered">
			<tbody class = "text-center">
				<tr>
				<th scope="row"><i class="fa fa-globe mr-2"></i>@lang('fund.country')</th>
				<td>{!! $fund->country_name !!} <span class="flag-icon flag-icon-{!! strtolower($fund->country_code) !!}"></span></td>
				</tr>
				<tr>
				<th scope="row"><i class="fa fa-map-signs mr-1"></i>@lang('fund.provinceState')</th>
				<td>{!! $fund->province_name !!}</td>
				</tr>
				<tr>
				<th scope="row"><i class="fa fa-industry mr-1"></i>@lang('fund.city')</th>
				<td>{!! $fund->city_name !!}</td>
				</tr>
				<tr>
				<th scope="row"><i class="fa fa-envelope mr-1"></i>@lang('fund.email')</th>
				<td>{!! $fund->email !!}</td>
				</tr>
				<tr>
				<th scope="row"><i class="fa fa-phone-square mr-1"></i>@lang('fund.phone')</th>
				<td>{!! $fund->phone !!}</td>
				</tr>
				<tr>
				<th scope="row"><i class="fa fa-location-arrow mr-1"></i>@lang('fund.legalAddress')</th>
				<td>{!! $fund->full_address !!}</td>
				</tr>
			</tbody>
				</table>
              </div>
		<div class="col-md-4 order-md-2 mb-4">
			<img class = "wow animated pulse infinite img-fluid d-block mx-auto" src = "https://thumbs.dreamstime.com/b/map-location-marker-flat-icon-white-generic-folding-nameless-city-map-flat-icon-red-gps-marker-isolated-white-97460808.jpg" width="48" height="48">
			<h4 class="justify-content-between align-items-center mb-3 text-center">
				<span>@lang('fund.mapLocation')</span>
            </h4>
          <ul class="list-group mb-3">
			<div id="map-container" class="z-depth-1"></div>
          </ul>
        </div>
            </div>
        </div>
      </div>
	  @endforeach
    </div>
@include ('other.modal')
@include ('other.footer')
</body>
@include('other.scripts')
@include('other.map')
</html>