<?php

Route::get('/', 'ConfiguracionController@index');
Route::get('/inicio', 'ConfiguracionController@inicio');
Route::post('/login', 'ConfiguracionController@login');
Route::get('/home','ConfiguracionController@home');
Route::get('/logout','ConfiguracionController@logout');