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
    $funds = Fund::all();
    return view('welcome', compact('funds'));
});
Route::get('fund/{fund}', function ($id){

    $fund = Fund::find($id);

    if (empty($fund)){return view ('error.notfound');}

    return view ('showFund', compact('fund'));
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Auth::routes();
Route::get('admin/home', 'HomeController@index');
Route::resource('admin/funds', 'FundsController');
