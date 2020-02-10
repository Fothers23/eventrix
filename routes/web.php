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

// Rooms
Route::get('/venue/{venue}/rooms/create', 'RoomController@create')->name('rooms.create');
Route::post('/venue/{venue}/rooms', 'RoomController@store')->name('venues.rooms.store');
Route::resource('rooms', 'RoomController')->except(['create', 'store']);

//Events
Route::get('/organisation/{organisation}/events/create', 'EventController@create')->name('events.create');
Route::post('/organisation/{organisation}/events', 'EventController@store')->name('organisations.events.store');
Route::resource('events', 'EventController')->except(['create', 'store']);

Route::resource('organisations', 'OrganisationController'); // CRUD FOR ORGANISATIONS

Route::get('/home', 'HomeController@index')->name('home');

//Venues
Route::resource('venues', 'VenueController');
