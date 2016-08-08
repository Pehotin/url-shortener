<?php

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/', 'LinksController@create');
Route::post('/', 'LinksController@store');
Route::get('{hash}', 'LinksController@redirect');
