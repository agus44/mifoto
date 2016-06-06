<?php

Route::get('/', 'ConfiguracionController@index');
Route::get('/inicio', 'ConfiguracionController@inicio');
Route::post('/login', 'ConfiguracionController@login');
Route::get('/home','ConfiguracionController@home');
Route::get('/logout','ConfiguracionController@logout');
Route::get('/configuracion/{menu}','ConfiguracionController@configuracion');
Route::get('/permisos_rol/{menu}','ConfiguracionController@permisos_rol');
Route::post('/get_departamentos','ConfiguracionController@get_departamentos');
Route::post('/get_roles','ConfiguracionController@get_roles');
Route::post('/get_permisos_rol','ConfiguracionController@get_permisos_rol');
Route::post('/get_permisos_rol_hijos','ConfiguracionController@get_permisos_rol_hijos');
Route::post('/actualizar_modulo_sinhijos','ConfiguracionController@actualizar_modulo_sinhijos');
Route::post('/actualizar_modulo_conhijos','ConfiguracionController@actualizar_modulo_conhijos');