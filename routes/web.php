<?php

Route::get('/', 'PagesController@inicio')->name('inicio');

Route::get('fotos','PagesController@fotos')->name('foto');

Route::get('blog','PagesController@noticias')->name('noticias');

Route::get('nosotros/{nombre?}','PagesController@nosotros')->name('nosotros');

Route::get('form','PagesController@form')->name('formulario');

Route::get('club','PagesController@club')->name('club');

