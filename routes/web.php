<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'AdminController@login');
Route::get('/login/mascota', 'AdminController@elegir_mascota');
Route::get('/admin-menu', 'AdminController@admin_menu');
Route::get('/admin-menu/mascotas/ver', 'AdminController@ver_mascotas');
Route::get('/admin-menu/personas/ver', 'AdminController@ver_personas');
Route::get('/admin-menu/personal/ver', 'AdminController@ver_personal');
Route::get('/admin-menu/personas/borrar/{id}','AdminController@deletePersona');
Route::get('/admin-menu/mascotas/borrar/{id}','AdminController@deleteMascota');
Route::get('/admin-menu/personal/borrar/{id}', 'AdminController@deletePersonal');
Route::get('/admin-menu/foro/borrar/{id}', 'AdminController@deleteTema');
Route::post('/admin-menu/personas/añadir/nueva', 'AdminController@addPersona');
Route::get('/admin-menu/personas/añadir', 'AdminController@showPerson');
Route::get('/admin-menu/personas/editar/{id}', 'AdminController@editPerson');
Route::post('/admin-menu/mascotas/añadir/nueva', 'AdminController@addMascota');
Route::get('/admin-menu/mascotas/añadir', 'AdminController@showMascota');
Route::get('/admin-menu/citas/ver', 'AdminController@index');
Route::get('/admin-menu/mascotas/editar/{id}', 'AdminController@editMascota');
Route::get('/admin-menu/foro/ver', 'AdminController@verForo');
Route::post('/admin-menu/mascotas/save/{id}', 'AdminController@saveMascota');
Route::post('/admin-menu/historial/save/{id}', 'AdminController@saveHistorial');
Route::post('/admin-menu/citas/añadir', 'AdminController@addCita');
Route::get('/admin-menu/citas/editar', 'AdminController@editCitas');
Route::get('/admin-menu/citas/editar/{id}', 'AdminController@edit');
Route::post('/admin-menu/citas/editar/actualizar', 'AdminController@updateCita');
Route::resource('/admin-menu/citas/editar/eliminar', 'EventController');

Route::post('/login/autenticacion', 'AdminController@comprobarDatos');
Route::get('/prueba', 'AdminController@prueba');
Route::get('/info/{id}', 'AdminController@infoMascota');
Route::get('/historial/{id}', 'AdminController@verHisto');
Route::get('/foro/{id}', 'AdminController@show_Foro');
Route::get('/foro/{id}/ver/{idTema}', 'AdminController@ver_Tema');
Route::get('/cita/{id}', 'AdminController@pedirCita');
Route::post('/cita/guardar', 'AdminController@addCitaCliente');
Route::get('/perfil/{id}', 'AdminController@verPerfilPersona');

Route::get('/admin-menu/mascotas/historial/{id}' , 'AdminController@showHistory');
Route::get('/admin-menu/mascotas/historial/añadir/{id}', 'AdminController@addHistory');
Route::get('/admin-menu/mascotas/historial/editar', 'AdminController@editHistory');
Route::get('/admin-menu/foro/añadir', 'AdminController@addForo');
Route::get('/admin-menu/foro/ver', 'AdminController@verForo');

Route::get('/admin-menu/personal/añadir', 'AdminController@verPersonal');
Route::post('/admin-menu/personal/añadir/nueva', 'AdminController@addPersonal');

Route::post('/admin-menu/foro/añadir/nueva', 'AdminController@addTema');
Route::get('/admin-menu/foro/ver/{id}', 'AdminController@verTema');

Route::get('/admin-menu/mascotas/historial/editar/{id}', 'AdminController@editConsulta');
Route::post('/admin-menu/mascotas/historial/añadir/nueva', 'AdminController@addConsulta');

Route::get('/home', 'AdminController@home');
Route::get('/prova', 'AdminController@prova');
Route::get('/quienes-somos', 'AdminController@quienes');
Route::get('/servicios', 'AdminController@servicios');
Route::get('/contacto', 'AdminController@contacto');
Route::get('/hotel', 'AdminController@hotel');