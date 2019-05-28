<?php
/**
 * Home
 */

Route::get('/', 'PagesController@inicio')->name('home');

/**
 *  Login/Register
 */

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

/**
 * Search Clubs
 */

Route::get('search','PagesController@search')->name('search');

/**
 * Club
 */

Route::get('club/{ID?}','ClubController@club')->name('club');

/**
 * Request of new club
 */

Route::get('registrationClub','RequestNewClubController@registrationClub')->name('registrationClub');

/**
 * Admin Tools
 */
Route::post('insertSport','AdminToolsController@insertSport');
Route::post('insertService','AdminToolsController@insertService');
Route::post('createPista','AdminToolsController@StorePista');
Route::post('insertTournament','AdminToolsController@insertTournament');
Route::post('insertClub','AdminToolsController@insertClub');

Route::get('eliminar','AdminToolsController@Eliminar')->name('eliminar');
Route::get('deleteClub/{id?}','AdminToolsController@deleteClub')->name('deleteClub');
Route::get('deleteDeporte/{id?}','AdminToolsController@deleteDeporte')->name('deleteDeporte');
Route::get('deleteServicio/{id?}','AdminToolsController@deleteServicio')->name('deleteServicio');
Route::get('deletePista/{id?}','AdminToolsController@deletePista')->name('deletePista');
Route::get('deleteTorneo/{id?}','AdminToolsController@deleteTorneo')->name('deleteTorneo');


/**
 *  Book fields 
 */

Route::get('timetable/{id?}/{id2?}','ReserveFieldController@timetable')->name('timetable');
Route::get('insertbookbd/{id?}/{id2?}/{id3?}/{id4?}/{id5?}','ReserveFieldController@insertbookbd')->name('insertbookbd');
Route::get('timetablepart/{id?}/{id2?}/{id3?}','ReserveFieldController@timetablepart')->name('timetablepart');
Route::get('filters/{id?}/{id2?}/{id3?}/{id4?}/{id5?}/{id6?}/{id7?}','ReserveFieldController@filters')->name('filters');
Route::get('detailtimetable/{id?}/{id2?}/{id3?}/{id4?}','ReserveFieldController@detailtimetable')->name('detailtimetable');


/**
 * Profile
 */

Route::get('getprofileinfo/{id?}/{id2?}','ProfileController@getprofileinfo')->name('getprofileinfo');
Route::post('editprofileprivate/{id?}','ProfileController@editprofileprivate')->name('editprofileprivate');
Route::post('editprofilepublic/{id?}','ProfileController@editprofilepublic')->name('editprofilepublic');
Route::post('editpassword/{id?}','ProfileController@editpassword')->name('editpassword');
Route::get('deleteaccount/{id?}','ProfileController@deleteaccount')->name('deleteaccount');
Route::get('deletebook/{id?}/{id2?}','ProfileController@deletebook')->name('deletebook');

/**
 * 
 *  Tournaments
 * 
 */

Route::get('tournaments','TournamentsController@tournaments')->name('tournaments');
Route::get('tournamentsSearched','TournamentsController@tournamentsSearched')->name('tournamentsSearched');
Route::get('signUpTournament/{id?}','TournamentsController@signUpTournament')->name('signUpTournament');
Route::get('unsuscribeTournament/{id?}/{id2?}/{id3?}','TournamentsController@unsuscribeTournament')->name('unsuscribeTournament');


Auth::routes();
