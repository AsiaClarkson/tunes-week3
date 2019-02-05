<?php

// Route -> Controller -> Load View

Route::get('/', 'InvoicesController@index');
Route::get('/genres', 'GenresController@index');
Route::get('/genres/{id}/edit', 'GenresController@edit');
Route::post('/genres', 'GenresController@store');
Route::get('/tracks', 'TracksController@index');
Route::post('/tracks', 'TracksController@store');
Route::get('/tracks/new', 'TracksController@create');
Route::get('/playlists', 'PlaylistsController@index');
Route::get('/playlists/new', 'PlaylistsController@create');
Route::get('/playlists/{id}', 'PlaylistsController@index');
Route::post('/playlists', 'PlaylistsController@store');
