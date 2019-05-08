<?php

Route::get('/', 'PagesController@inicio')->name('home');

//Route::get('nosotros/{nombre?}','PagesController@nosotros')->name('nosotros');

Route::get('search','PagesController@search')->name('search');

Route::get('club','PagesController@club')->name('club');

Route::get('registrationClub','PagesController@registrationClub')->name('registrationClub');

Route::get('logIn','PagesController@logIn')->name('logIn');

Route::get('logOut','PagesController@logOut')->name('logOut');

Route::get('registration','PagesController@registration')->name('registration');

Route::get('myProfile','PagesController@myProfile')->name('myProfile');

Route::get('tournament','PagesController@tournament')->name('tournament');


