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

//Route::post('users', 'UsersAPIController@store');
Route::get('users/{user}', 'UsersAPIController@show');

//Route::resource('users', 'UsersAPIController');




























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