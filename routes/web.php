<?php

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
//Configuracion para usar el middleware de los roles en las rutas
Route::middleware(['auth'])->group(function(){
    //Rutas para manejar los roles del sistema
    Route::get('roles','RoleController@index')->name('index_roles')->middleware('permission:index_roles');
    Route::get('create_roles','RoleController@create')->name('create_roles')->middleware('permission:create_roles');
    Route::post('store_roles','RoleController@store')->name('store_roles')->middleware('permission:store_roles');
    //Fin Rutas para los roles del sistema


    Route::resource('/usuarios', 'UserController');
    //rutas para la seccion de estudiantes
    Route::resource('/estudiantes', 'StudentController');
    Route::post('/cargar', 'StudentController@cargar_uni');
    Route::post('/cargarinstituto', 'StudentController@cargar_insti');
    Route::post('/carrer', 'StudentController@cargar_carrer');
    Route::post('/cargar_carrera_uni','StudentController@cargar_carre_unir');
    //Rutas para notas
    Route::get('/Conguracion/Agregar', 'ConguracionController@Agregar');
});