<li class="header"><b>Main Tables</b></li>
<li class="{{ Request::is('languages*') ? 'active' : '' }}">
    <a href="{!! route('languages.index') !!}"><i class="fa fa-language"></i><span>Languages</span></a>
</li>

<li class="{{ Request::is('countries*') ? 'active' : '' }}">
    <a href="{!! route('countries.index') !!}"><i class="fa fa-globe"></i><span>Countries</span></a>
</li>

<li class="{{ Request::is('provinces*') ? 'active' : '' }}">
    <a href="{!! route('provinces.index') !!}"><i class="fa fa-map-signs"></i><span>Provinces</span></a>
</li>

<li class="{{ Request::is('cities*') ? 'active' : '' }}">
    <a href="{!! route('cities.index') !!}"><i class="fa fa-industry"></i><span>Cities</span></a>
</li>

<li class="{{ Request::is('addresses*') ? 'active' : '' }}">
    <a href="{!! route('addresses.index') !!}"><i class="fa fa-location-arrow"></i><span>Addresses</span></a>
</li>

<li class="{{ Request::is('locations*') ? 'active' : '' }}">
    <a href="{!! route('locations.index') !!}"><i class="fa fa-map-marker"></i><span>Locations</span></a>
</li>

<li class="{{ Request::is('funds*') ? 'active' : '' }}">
    <a href="{!! route('funds.index') !!}"><i class="fa fa-heart"></i><span>Funds</span></a>
</li>
<li class="header"><b>Additional Tables</b></li>
<li class = "treeview">
<a href="#"><i class="fa fa-cc"></i><span>Translations</span><i class="fa fa-angle-left right"></i></a>
<ul class="treeview-menu">
<li class="{{ Request::is('countryTranslations*') ? 'active' : '' }}">
    <a href="{!! route('countryTranslations.index') !!}"><i class="fa fa-globe"></i><span>Country Translations</span></a>
</li>
<li class="{{ Request::is('provinceTranslations*') ? 'active' : '' }}">
    <a href="{!! route('provinceTranslations.index') !!}"><i class="fa fa-map-signs"></i><span>Province Translations</span></a>
</li>
<li class="{{ Request::is('cityTranslations*') ? 'active' : '' }}">
    <a href="{!! route('cityTranslations.index') !!}"><i class="fa fa-industry"></i><span>City Translations</span></a>
</li>
<li class="{{ Request::is('addressTranslations*') ? 'active' : '' }}">
    <a href="{!! route('addressTranslations.index') !!}"><i class="fa fa-location-arrow"></i><span>Address Translations</span></a>
</li>
<li class="{{ Request::is('fundTranslations*') ? 'active' : '' }}">
    <a href="{!! route('fundTranslations.index') !!}"><i class="fa fa-heart"></i><span>Fund Translations</span></a>
</li>
</ul>
</li>


  <!--li><a href="#">One Level</a></li>
  
  <li class="treeview">
    <a href="#">Multilevel</a>
    <ul class="treeview-menu">
      <li><a href="#">Level 2</a></li>
    </ul>
  </li-->