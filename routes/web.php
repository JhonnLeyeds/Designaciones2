<?php


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Rutas para Usuarios
Route::resource('/usuarios', 'UserController');


//asi cargo nueva ruta


//rutas para la seccion de estudiantes
Route::resource('/estudiantes', 'StudentController');
Route::post('/cargar', 'StudentController@cargar_uni');
Route::post('/cargarinstituto', 'StudentController@cargar_insti');
Route::post('/carrer', 'StudentController@cargar_carrer');
Route::post('/cargar_carrera_uni','StudentController@cargar_carre_unir');

//Rutas para notas
Route::get('/Conguracion/Agregar', 'ConguracionController@Agregar');








