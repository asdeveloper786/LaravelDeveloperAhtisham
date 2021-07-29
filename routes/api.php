<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::get('country','CountryController@country');
// Route::get('country/{id}','CountryController@countryById');
// Route::post('country','CountryController@countryAdd');
// Route::put('country/{id}','CountryController@CountryUpdate');
// Route::delete('country/{id}','CountryController@CountryDelete');
    // we will use resource controller instead of use it speratly....

// Route::group(['middleware'=>'auth:api'],function(){
//  Route::apiResource('country','Country');

// });
Route::apiResource('country', 'Country')->middleware('client');



