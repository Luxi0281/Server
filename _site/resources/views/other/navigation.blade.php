<nav class="navbar navbar-dark bg-dark">
 <div class="container">
<a href="{{url('/')}}"> 
	<img class = "d-none d-md-block" src="https://image.ibb.co/gwYkKx/1_Primary_logo_on_transparent_200x71.png" alt="1_Primary_logo_on_transparent_200x71" border="0">
</a>
<div class = "text-center">
	<form action="language" method="post">
	<select name="locale" id="locale" style="width:200px;" onchange="this.form.submit()">
		<option value='ru' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ru" data-title="Russia" {{ App::getLocale() == 'ru' ? ' selected' : '' }} >@lang('welcome.russian')</option>
		<option value='en' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag us" data-title="United Stares of America" {{ App::getLocale() == 'en' ? ' selected' : '' }}>@lang('welcome.english')</option>	
	</select>
	{{ csrf_field() }}
	</form>
</div>
        <button class="navbar-toggler hidden-lg-up pull-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar1">
            ☰
        </button>	
        <div class="collapse navbar-toggleable-md" id="collapsingNavbar1">
            <ul class="nav navbar-nav">
                @if (Route::has('login'))
                    <li class="nav-item">
                        @auth
                            @if (Request::is('fund/*')) <a href="{!! url('/') !!}" style = "margin: 5px;"><button class = "btn btn-primary">@lang('welcome.mainPage') </button></a> @endif
                            <a href="{{ url('admin/home') }}" style = "margin: 5px;"><button class = "btn btn-success">@lang('welcome.controlPanel')</button></a>
                            <a href="{!! url('/logout') !!}" style = "margin: 5px;"><button class = "btn btn-danger">@lang('welcome.signOut') </button></a>
                        @else
                            @if (Request::is('fund/*')) <a href="{!! url('/') !!}" style = "margin: 5px;"><button class = "btn btn-success">@lang('welcome.mainPage')</button></a> @endif
                            <a data-target = "#myModal" data-toggle="modal" style = "margin: 5px;"><button class = "btn btn-info">@lang('welcome.adminSection')</button></a>
                        @endauth
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

