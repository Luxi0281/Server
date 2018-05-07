<li class="{{ Request::is('languages*') ? 'active' : '' }}">
    <a href="{!! route('languages.index') !!}"><i class="fa fa-edit"></i><span>Languages</span></a>
</li>

<li class="{{ Request::is('countries*') ? 'active' : '' }}">
    <a href="{!! route('countries.index') !!}"><i class="fa fa-edit"></i><span>Countries</span></a>
</li>

<li class="{{ Request::is('countryTranslations*') ? 'active' : '' }}">
    <a href="{!! route('countryTranslations.index') !!}"><i class="fa fa-edit"></i><span>Country Translations</span></a>
</li>

<li class="{{ Request::is('provinces*') ? 'active' : '' }}">
    <a href="{!! route('provinces.index') !!}"><i class="fa fa-edit"></i><span>Provinces</span></a>
</li>

<li class="{{ Request::is('provinceTranslations*') ? 'active' : '' }}">
    <a href="{!! route('provinceTranslations.index') !!}"><i class="fa fa-edit"></i><span>Province Translations</span></a>
</li>

<li class="{{ Request::is('cities*') ? 'active' : '' }}">
    <a href="{!! route('cities.index') !!}"><i class="fa fa-edit"></i><span>Cities</span></a>
</li>

<li class="{{ Request::is('cityTranslations*') ? 'active' : '' }}">
    <a href="{!! route('cityTranslations.index') !!}"><i class="fa fa-edit"></i><span>City Translations</span></a>
</li>

<li class="{{ Request::is('addresses*') ? 'active' : '' }}">
    <a href="{!! route('addresses.index') !!}"><i class="fa fa-edit"></i><span>Addresses</span></a>
</li>

<li class="{{ Request::is('addressTranslations*') ? 'active' : '' }}">
    <a href="{!! route('addressTranslations.index') !!}"><i class="fa fa-edit"></i><span>Address Translations</span></a>
</li>

<li class="{{ Request::is('locations*') ? 'active' : '' }}">
    <a href="{!! route('locations.index') !!}"><i class="fa fa-edit"></i><span>Locations</span></a>
</li>

<li class="{{ Request::is('funds*') ? 'active' : '' }}">
    <a href="{!! route('funds.index') !!}"><i class="fa fa-edit"></i><span>Funds</span></a>
</li>

<li class="{{ Request::is('fundTranslations*') ? 'active' : '' }}">
    <a href="{!! route('fundTranslations.index') !!}"><i class="fa fa-edit"></i><span>Fund Translations</span></a>
</li>

