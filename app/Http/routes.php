<?php

Route::get('/', 'LinksController@create');
Route::post('/', 'LinksController@store');
Route::get('{hash}', 'LinksController@redirect');