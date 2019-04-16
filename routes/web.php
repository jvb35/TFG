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
Route::get('/admin-menu/personas/borrar/{id}','AdminController@deletePersona');
Route::get('/admin-menu/mascotas/borrar/{id}','AdminController@deleteMascota');
Route::post('/admin-menu/personas/añadir/nueva', 'AdminController@addPersona');
Route::get('/admin-menu/personas/añadir', 'AdminController@showPerson');
Route::get('/admin-menu/personas/editar', 'AdminController@editPerson');
Route::post('/admin-menu/mascotas/añadir/nueva', 'AdminController@addMascota');
Route::get('/admin-menu/mascotas/añadir', 'AdminController@showMascota');
Route::get('/admin-menu/citas/ver', 'EventController@index');
Route::get('/admin-menu/mascotas/editar/{id}', 'AdminController@editMascota');
Route::get('/admin-menu/foro/ver', 'AdminController@verForo');

Route::post('/admin-menu/citas/añadir', 'EventController@store');
Route::get('/admin-menu/citas/editar', 'EventController@show');
Route::get('/admin-menu/citas/editar/{id}', 'EventController@edit');
Route::resource('/admin-menu/citas/editar/actualizar', 'EventController');
Route::resource('/admin-menu/citas/editar/eliminar', 'EventController');

Route::get('/admin-menu/mascotas/historial' , 'AdminController@showHistory');
Route::get('/admin-menu/mascotas/historial/añadir', 'AdminController@addHistory');
Route::get('/admin-menu/mascotas/historial/editar', 'AdminController@editHistory');
Route::get('/admin-menu/foro/añadir', 'AdminController@addForo');
Route::get('/admin-menu/foro/ver', 'AdminController@showForo');