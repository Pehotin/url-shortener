<?php

Route::auth();

Route::get('/', 'LinksController@create');
Route::post('/', 'LinksController@store');
Route::get('{hash}', 'LinksController@redirect');

Route::get('{hash}/analytics', [
    'as' => 'show.analytics',
    'uses' => 'ClicksController@show'
]);