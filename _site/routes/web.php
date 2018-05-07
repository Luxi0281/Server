<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\Fund;
use Laracasts\Flash\Flash;

Route::get('/', function () {
    //$funds = Fund::all();
    //return view('welcome', compact('funds'));
    return view('welcome');
});
/*
Route::get('fund/{fund}', function ($id){

    $fund = Fund::findOrFail($id);
    $previous = Fund::where('id', '<', $fund->id)->max('id');
    $next = Fund::where('id', '>', $fund->id)->min('id');

    if (empty($fund)){ abort(404);}

    return view ('showFund', compact('fund'))->with('previous', $previous)->with('next', $next);
});
*/

Route::get('api/getAllFunds', function (){

    $funds = DB::table('languages')
        ->select(
            'funds.id',
            'languages.language_code',
            'languages.language_name',
            'fund_translations.title',
            'fund_translations.description',
            'funds.picture',
            'funds.link',
            'funds.email',
            'funds.phone',
            'locations.latitude',
            'locations.longitude',
            'addresses.zip_code',
            'address_translations.full_address',
            'city_translations.city_name',
            'provinces.province_code',
            'province_translations.province_name',
            'country_translations.country_name',
            'countries.country_code'
        )
        ->join('fund_translations','fund_translations.language_id', '=', 'languages.id')
        ->join('funds', 'funds.id', '=', 'fund_translations.fund_id')
        ->join('locations', 'locations.id', '=', 'funds.location_id')
        ->join('addresses', 'addresses.id', '=', 'locations.address_id')
        ->join('address_translations', function ($join){
            $join->on('address_translations.address_id', '=', 'addresses.id');
            $join->on('languages.id', '=', 'address_translations.language_id');
        })
        ->join('cities', 'cities.id', '=', 'addresses.city_id')
        ->join('city_translations', function ($join){
            $join->on('city_translations.city_id', '=', 'cities.id');
            $join->on('languages.id', '=', 'city_translations.language_id');
        })
        ->join('provinces', 'provinces.id', '=', 'cities.province_id')
        ->join('province_translations', function ($join){
            $join->on('province_translations.province_id', '=', 'provinces.id');
            $join->on('languages.id','=','province_translations.language_id');
        })
        ->join('countries', 'countries.id', '=', 'provinces.country_id')
        ->join('country_translations', function ($join){
            $join->on('country_translations.country_id', '=', 'countries.id');
            $join->on('languages.id', '=', 'country_translations.language_id');
        })
        ->get();

    return $funds->toJson();
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Auth::routes();
Route::get('admin/home', 'HomeController@index');
Route::resource('admin/funds', 'FundsController');


























Route::resource('languages', 'LanguageController');

Route::resource('countries', 'CountryController');

Route::resource('countryTranslations', 'CountryTranslationController');

Route::resource('provinces', 'ProvinceController');

Route::resource('provinceTranslations', 'ProvinceTranslationController');

Route::resource('cities', 'CityController');

Route::resource('cityTranslations', 'CityTranslationController');

Route::resource('addresses', 'AddressController');

Route::resource('addressTranslations', 'AddressTranslationController');

Route::resource('locations', 'LocationController');



Route::resource('fundTranslations', 'FundTranslationController');

Route::resource('funds', 'FundController');