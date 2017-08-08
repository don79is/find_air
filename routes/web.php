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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'countries'], function () {
    Route::get('/', ['as' => 'app.countries.index', 'uses' => 'FFCountriesController@adminIndex']);
    Route::get('/create', ['as' => 'app.countries.create', 'uses' => 'FFCountriesController@adminCreate']);
    Route::post('/create', ['as' => 'app.countries.store', 'uses' => 'FFCountriesController@adminStore']);
    Route::group(['prefix' => '{id}'], function () {
        Route::get('/edit', ['as' => 'app.countries.edit', 'uses' => 'FFCountriesController@adminEdit']);
        Route::post('/edit', ['as' => 'app.countries.update', 'uses' => 'FFCountriesController@adminUpdate']);
        Route::get('/', ['as' => 'app.countries.show', 'uses' => 'FFCountriesController@adminShow']);
        Route::delete('/', ['as' => 'app.countries.delete', 'uses' => 'FFCountriesController@adminDestroy']);
    });
});
Route::group(['prefix' => 'flights'], function () {
    Route::get('/', ['as' => 'app.flights.index', 'uses' => 'FFFlightsController@adminIndex']);
    Route::get('/create', ['as' => 'app.flights.create', 'uses' => 'FFFlightsController@adminCreate']);
    Route::post('/create', ['as' => 'app.flights.store', 'uses' => 'FFFlightsController@adminStore']);
    Route::group(['prefix' => '{id}'], function () {
        Route::get('/edit', ['as' => 'app.flights.edit', 'uses' => 'FFFlightsController@adminEdit']);
        Route::post('/edit', ['as' => 'app.flights.update', 'uses' => 'FFFlightsController@adminUpdate']);
        Route::get('/', ['as' => 'app.flights.show', 'uses' => 'FFFlightsController@adminShow']);
        Route::delete('/', ['as' => 'app.flights.delete', 'uses' => 'FFFlightsController@adminDestroy']);
    });
});
Route::group(['prefix' => 'aiports'], function () {
    Route::get('/', ['as' => 'app.aiports.index', 'uses' => 'FFAirportsController@adminIndex']);
    Route::get('/create', ['as' => 'app.aiports.create', 'uses' => 'FFAirportsController@adminCreate']);
    Route::post('/create', ['as' => 'app.aiports.store', 'uses' => 'FFAirportsController@adminStore']);
    Route::group(['prefix' => '{id}'], function () {
        Route::get('/edit', ['as' => 'app.aiports.edit', 'uses' => 'FFAirportsController@adminEdit']);
        Route::post('/edit', ['as' => 'app.aiports.update', 'uses' => 'FFAirportsController@adminUpdate']);
        Route::get('/', ['as' => 'app.aiports.show', 'uses' => 'FFAirportsController@adminShow']);
        Route::delete('/', ['as' => 'app.aiports.delete', 'uses' => 'FFAirportsController@adminDestroy']);
    });
});
Route::group(['prefix' => 'airlines'], function () {
    Route::get('/', ['as' => 'app.airlines.index', 'uses' => 'FFAirlinesController@adminIndex']);
    Route::get('/create', ['as' => 'app.airlines.create', 'uses' => 'FFAirlinesController@adminCreate']);
    Route::post('/create', ['as' => 'app.airlines.store', 'uses' => 'FFAirlinesController@adminStore']);
    Route::group(['prefix' => '{id}'], function () {
        Route::get('/edit', ['as' => 'app.airlines.edit', 'uses' => 'FFAirlinesController@adminEdit']);
        Route::post('/edit', ['as' => 'app.airlines.update', 'uses' => 'FFAirlinesController@adminUpdate']);
        Route::get('/', ['as' => 'app.airlines.show', 'uses' => 'FFAirlinesController@adminShow']);
        Route::delete('/', ['as' => 'app.airlines.delete', 'uses' => 'FFAirlinesController@adminDestroy']);
    });
});



