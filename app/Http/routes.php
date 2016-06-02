<?php

Route::get('/', 'ConfiguracionController@index');
Route::get('/inicio', 'ConfiguracionController@inicio');
Route::post('/login', 'ConfiguracionController@login');
Route::get('/home','ConfiguracionController@home');
Route::get('/logout','ConfiguracionController@logout');
Route::get('/configuracion/{menu}','ConfiguracionController@configuracion');
Route::get('/permisos_rol/{menu}','ConfiguracionController@permisos_rol');
Route::post('/get_departamentos','ConfiguracionController@get_departamentos');