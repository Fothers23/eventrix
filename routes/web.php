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

//Events
Route::get('/organisation/{organisation}/create-event', 'EventController@create')->name('events.create');
Route::resource('events', 'EventController');

//Venues
Route::resource('venues', 'VenueController');
