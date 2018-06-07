<nav class="navbar navbar-expand-lg elegant-color-dark navbar-dark">
<div class = "container">
    <a href="{{url('/')}}" class = "navbar-brand"> 
		<img class = "d-none d-md-block" src="https://i.imgur.com/2XbZgWG.png" alt="Luxi & Nash" border="0">
	</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 liPad text-center">
				@if (Request::is('foundation/*')) 
				<li class = "nav-link"><a href="{!! url('/') !!}"><button class = "btn btn-info">@lang('welcome.mainPage')</button></a></li> 
				@endif
                @if (Route::has('login'))
                        @auth
                            <li class = "nav-link"><a href="{{ url('admin/home') }}"><button class = "btn btn-success">@lang('welcome.controlPanel')</button></a></li> 
                            <li class = "nav-link"><a href="{!! url('/logout') !!}"><button class = "btn btn-danger">@lang('welcome.signOut') </button></a></li>
						
                @else
                            <li class = "nav-link"><a data-target = "#myModal" data-toggle="modal"><button class = "btn btn-primary">@lang('welcome.adminSection')</button></a></li>
						@endauth
                @endif
    </ul>
	@include('other.langSwitcher')
  </div>
  </div>
</nav>