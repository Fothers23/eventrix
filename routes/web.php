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

Auth::routes();

Route::resource('organisations', 'OrganisationController'); // CRUD FOR ORGANISATIONS

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/events', 'EventController@index')->name('events.index');

//Venues
Route::get('/venues', 'VenueController@index')->name('venues.index');

Route::get('/venues/create', 'VenueController@create')->name('venues.create');

Route::post('/venues', 'VenueController@store')->name('venues.store');

Route::get('/venues/{venue}', 'VenueController@show')->name('venues.show');

Route::get('/venues/{venue}/edit', 'VenueController@edit')->name('venues.edit');

Route::put('/venues/{venue}', 'VenueController@update')->name('venues.update');

Route::delete('/venues/{venue}', 'VenueController@destroy')->name('venues.destroy');
