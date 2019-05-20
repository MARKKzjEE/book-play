<?php

Route::get('/', 'PagesController@inicio')->name('home');

Route::get('search','PagesController@search')->name('search');

Route::get('club/{ID?}','PagesController@club')->name('club');

Route::get('registrationClub','PagesController@registrationClub')->name('registrationClub');

Route::get('logIn','PagesController@logIn')->name('logIn');

Route::get('logOut','PagesController@logOut')->name('logOut');

Route::get('registration','PagesController@registration')->name('registration');

Route::get('myProfile','PagesController@myProfile')->name('myProfile');

Route::get('tournaments','PagesController@tournaments')->name('tournaments');

Route::get('reservar','PagesController@reservar')->name('reservar');

Route::get('tournamentsSearched','PagesController@tournamentsSearched')->name('tournamentsSearched');

/**
 *  Functions to book a field
 * 
 * 
 */

Route::get('insertarReserva','PagesController@insertarReserva')->name('insertarReserva');

Route::get('timetable/{id?}/{id2?}','PagesController@timetable')->name('timetable');

Route::get('insertbookbd/{id?}/{id2?}/{id3?}/{id4?}/{id5?}','PagesController@insertbookbd')->name('insertbookbd');

Route::get('timetablepart/{id?}/{id2?}/{id3?}','PagesController@timetablepart')->name('timetablepart');

Route::get('filters/{id?}/{id2?}/{id3?}/{id4?}/{id5?}/{id6?}/{id7?}','PagesController@filters')->name('filters');

Route::get('detailtimetable/{id?}/{id2?}/{id3?}/{id4?}','PagesController@detailtimetable')->name('detailtimetable');


/**
 * Functions relative to clubpage
 */


Route::get('getprofileinfo/{id?}/{id2?}','PagesController@getprofileinfo')->name('getprofileinfo');

Route::post('editprofileprivate/{id?}','PagesController@editprofileprivate')->name('editprofileprivate');

Route::post('editprofilepublic/{id?}','PagesController@editprofilepublic')->name('editprofilepublic');

Route::post('editpassword/{id?}','PagesController@editpassword')->name('editpassword');

Route::get('deleteaccount/{id?}','PagesController@deleteaccount')->name('deleteaccount');


