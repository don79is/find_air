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
Route::group(['prefix' => 'search'], function () {
    Route::get('/', ['as' => 'app.search.index', 'uses' => 'FFSearchController@adminIndex']);
});
Route::group(['prefix' => 'generate'], function () {
    Route::get('/airports', ['uses' => 'FFFakerController@generateAirports']);
    Route::get('/flights', ['uses' => 'FFFakerController@generateFlights']);
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
Route::group(['prefix' => 'airports'], function () {
    Route::get('/', ['as' => 'app.airports.index', 'uses' => 'FFAirportsController@adminIndex']);
    Route::get('/create', ['as' => 'app.airports.create', 'uses' => 'FFAirportsController@adminCreate']);
    Route::post('/create', ['as' => 'app.airports.store', 'uses' => 'FFAirportsController@adminStore']);
    Route::group(['prefix' => '{id}'], function () {
        Route::get('/edit', ['as' => 'app.airports.edit', 'uses' => 'FFAirportsController@adminEdit']);
        Route::post('/edit', ['as' => 'app.airports.update', 'uses' => 'FFAirportsController@adminUpdate']);
        Route::get('/', ['as' => 'app.airports.show', 'uses' => 'FFAirportsController@adminShow']);
        Route::delete('/', ['as' => 'app.airports.delete', 'uses' => 'FFAirportsController@adminDestroy']);
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



