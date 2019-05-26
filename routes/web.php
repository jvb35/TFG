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

//Administrador

Route::get('/admin-menu', 'AdminController@admin_menu');
Route::get('/admin-menu/mascotas/ver', 'MascotaController@ver_mascotas');
Route::get('/admin-menu/personas/ver', 'PersonaController@ver_personas');
Route::get('/admin-menu/personal/ver', 'PersonalController@ver_personal');
Route::get('/admin-menu/personas/borrar/{id}','PersonaController@deletePersona');
Route::get('/admin-menu/mascotas/borrar/{id}','MascotaController@deleteMascota');
Route::get('/admin-menu/personal/borrar/{id}', 'PersonalController@deletePersonal');
Route::get('/admin-menu/foro/borrar/{id}', 'ForoController@deleteTema');
Route::post('/admin-menu/personas/añadir/nueva', 'PersonaController@addPersona');
Route::get('/admin-menu/personas/añadir', 'PersonaController@showPerson');
Route::get('/admin-menu/personas/editar/{id}', 'PersonaController@editPerson');
Route::post('/admin-menu/mascotas/añadir/nueva', 'MascotaController@addMascota');
Route::get('/admin-menu/mascotas/añadir', 'MascotaController@showMascota');
Route::get('/admin-menu/citas/ver', 'CitaController@index');
Route::get('/admin-menu/mascotas/editar/{id}', 'MascotaController@editMascota');
Route::get('/admin-menu/foro/ver', 'ForoController@verForo');
Route::post('/admin-menu/mascotas/save/{id}', 'MascotaController@saveMascota');
Route::post('/admin-menu/historial/save/{id}', 'HistorialController@saveHistorial');
Route::post('/admin-menu/citas/añadir', 'CitaController@addCita');
Route::get('/admin-menu/citas/editar', 'CitaController@editCitas');
Route::get('/admin-menu/citas/editar/{id}', 'CitaController@edit');
Route::post('/admin-menu/citas/editar/actualizar', 'CitaController@updateCita');
Route::resource('/admin-menu/citas/editar/eliminar', 'EventController');
Route::get('/admin-menu/mascotas/historial/{id}' , 'HistorialController@showHistory');
Route::get('/admin-menu/mascotas/historial/añadir/{id}', 'HistorialController@addHistory');
Route::get('/admin-menu/mascotas/historial/editar', 'HistorialController@editHistory'); //No te la clase creada
Route::get('/admin-menu/foro/añadir', 'ForoController@addForo');
Route::get('/admin-menu/foro/ver', 'ForoController@verForo'); //Ni esta
Route::get('/admin-menu/ver-perfil', 'PersonalController@verPerfil');
Route::get('/admin-menu/personal/añadir', 'PersonalController@verPersonal');
Route::post('/admin-menu/personal/añadir/nueva', 'PersonalController@addPersonal');
Route::post('/admin-menu/foro/añadir/nueva', 'ForoController@addTema');
Route::get('/admin-menu/foro/ver/{id}', 'ForoController@verTema');
Route::get('/admin-menu/mascotas/historial/editar/{id}', 'HistorialController@editConsulta');
Route::post('/admin-menu/mascotas/historial/añadir/nueva', 'HistorialController@addConsulta');
Route::post('/admin-menu/ver-perfil/cambiar', 'PersonalController@changePassword');
Route::post('/perfil/cambiar', 'PersonaController@changePass');
Route::post('/main/checklogin', 'LoginController@checklogin');
Route::get('/logout', 'LoginController@logout');

//Cliente
Route::get('/info/{id}', 'MascotaController@infoMascota');
Route::get('/historial/{id}', 'HistorialController@verHisto');//No está
Route::get('/foro/{id}', 'ForoController@show_Foro');
Route::get('/foro/{id}/ver/{idTema}', 'ForoController@ver_Tema');
Route::get('/cita/{id}', 'CitaController@pedirCita');
Route::post('/cita/guardar', 'CitaController@addCitaCliente');
Route::get('/perfil/{id}', 'PersonaController@verPerfilPersona');
Route::get('/contacto/{id}', 'PersonaController@contact');
Route::post('/mailCliente', 'PersonaController@sendmailCliente');
Route::get('/login/mascota', 'MascotaController@elegir_mascota');

//Público
Route::get('/home', 'AdminController@home');
Route::get('/prova', 'AdminController@prova');
Route::get('/quienes-somos', 'AdminController@quienes');
Route::get('/servicios', 'AdminController@servicios');
Route::get('/contacto', 'AdminController@contacto');
Route::get('/hotel', 'AdminController@hotel');
Route::post('/mail', 'AdminController@sendmail');
Route::get('/login', 'AdminController@login');
