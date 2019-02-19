<?php

// Route -> Controller -> Load View



Route::middleware(['authenticated'])->group(function(){
    Route::get('/profile', 'AdminController@index'); 
    Route::get('/invoices', 'InvoicesController@index'); 
    Route::get('/settings', 'MaintenanceController@index');
    Route::post('/settings', 'MaintenanceController@toggleSettings');

});


Route::middleware(['maintenancemode'])->group(function(){
    Route::get('/genres', 'GenresController@index');
    Route::get('/genres/{id}/edit', 'GenresController@edit');
    Route::post('/genres', 'GenresController@store');

    Route::get('/tracks', 'TracksController@index');
    Route::post('/tracks', 'TracksController@store');
    Route::get('/tracks/new', 'TracksController@create');

    Route::get('/', 'PlaylistsController@index');
    Route::get('/playlists/new', 'PlaylistsController@create');
    Route::get('/playlists/{id}', 'PlaylistsController@index');
    Route::post('/playlists', 'PlaylistsController@store');

    Route::get('/signup', 'SignUpController@index');
    Route::post('signup', 'SignUpController@signup');

});

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');


Route::get('/maintenance', 'MaintenanceController@maintenance');