<?php

Route::get('/', 'PagesController@inicio')->name('inicio');

Route::get('fotos','PagesController@fotos')->name('foto');

Route::get('blog','PagesController@noticias')->name('noticias');

Route::get('perfil','PagesController@perfil')->name('perfil');

Route::get('nosotros/{nombre?}','PagesController@nosotros')->name('nosotros');

Route::get('form','PagesController@form')->name('formulario');

