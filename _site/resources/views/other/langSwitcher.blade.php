<form action="{{ route('switch') }}" method="post" class = "my-2 my-lg-0 text-center" id = "languageSwitcher">
	{{ csrf_field() }}
	<select name="locale" id="locale" style="width:300px;" onchange="this.form.submit()" class = "mr-sm-2" data-toggle="tooltip" data-container="nav" data-placement="top" title = "@lang('welcome.changeLanguage')">
		<option value='ru' data-image="{{ URL::asset('js/country-dropdown/images/msdropdown/icons/blank.gif')}}" data-imagecss="flag ru" data-title="Russia" {{ App::getLocale() == 'ru' ? ' selected' : '' }} >@lang('welcome.russian')</option>
		<option value='en' data-image="{{ URL::asset('js/country-dropdown/images/msdropdown/icons/blank.gif')}}" data-imagecss="flag us" data-title="United Stares of America" {{ App::getLocale() == 'en' ? ' selected' : '' }}>@lang('welcome.english')</option>	
	</select>
</form>