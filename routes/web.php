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


