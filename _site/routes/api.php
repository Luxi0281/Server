<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users/{user}', 'UsersAPIController@show');

Route::middleware('api')->get('{language_code}/getFunds', function ($language_code){
	
	
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
		//->where('language_code', '=', $language_code)
		->where([
		['funds.id', '!=', 20],
		['language_code', '=', $language_code]
		])
        ->get();
		return response()->json($funds);
});




























Route::resource('languages', 'LanguageAPIController');

Route::resource('countries', 'CountryAPIController');

Route::resource('country_translations', 'CountryTranslationAPIController');

Route::resource('provinces', 'ProvinceAPIController');

Route::resource('province_translations', 'ProvinceTranslationAPIController');

Route::resource('cities', 'CityAPIController');

Route::resource('city_translations', 'CityTranslationAPIController');

Route::resource('addresses', 'AddressAPIController');

Route::resource('address_translations', 'AddressTranslationAPIController');

Route::resource('locations', 'LocationAPIController');



Route::resource('fund_translations', 'FundTranslationAPIController');

Route::resource('funds', 'FundAPIController');