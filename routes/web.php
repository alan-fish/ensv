<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view ('inicio');
});


Auth::routes();

//Admin

//Rutas de inicio y cierre de sesión
Route::get('/admin/login', 'Admin\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Admin\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin/logout', 'Admin\AdminLoginController@adminLogout')->name('admin.logout');
//menu
Route::get('/admin/menu', 'Admin\AdminController@menu')->name('admin.menu');
//Rutas de admin para el manejo de los datos de los alumnos (crear,editar-actualizar y consultar)
//registro
Route::get('/admin/registro-alumno', 'Admin\AdminController@create')->name('admin.create');
Route::post('/admin/registro-alumno', 'Admin\AdminController@store')->name('admin.store');
//Consulta
Route::get('/admin/lista-alumno', 'Admin\AdminController@lista')->name('admin.lista');
//Editar
Route::get('/admin/{id}/edit-alumno', 'Admin\AdminController@editalumno')->name('admin.edit_alumno');
Route::put('/admin/{id}/edit-alumno', 'Admin\AdminController@updatealumno')->name('admin.update');
//Rutas de admin para el manejo de los datos de los docentes (crear,editar-actualizar y consultar)
//registro
Route::get('/admin/registro-docente', 'Admin\AdminController@createdocente')->name('admin.createdocente');
Route::post('/admin/registro-docente', 'Admin\AdminController@storedocente')->name('admin.storedocente');
//Consulta
Route::get('/admin/list', 'Admin\AdminController@list')->name('admin.list');
//Editar
Route::get('/admin/{id}/edit-docente', 'Admin\AdminController@edit_docente')->name('admin.edit_docente');
Route::put('/admin/{id}/edit-docente', 'Admin\AdminController@update_docente')->name('admin.update_docente');
//Rutas para la creación de los horarios
//crear
Route::get('/admin/materias/{id}/{string}', 'Admin\AdminController@getMaterias');
Route::get('/admin/horario', 'Admin\AdminController@horario')->name('admin.horario');
Route::post('/admin/horario', 'Admin\AdminController@createhorario')->name('admin.horario_store');
//Consultar horario
Route::get('/admin/consultarhorario', 'Admin\AdminController@consultarhorario')->name('admin.consultarhorario');


// Alumno
//Rutas de inicio y cierre de sesión
Route::get('/alumno/login', 'Alumno\AlumnoLoginController@showLoginForm')->name('alumno.login');
Route::post('/alumno/login', 'Alumno\AlumnoLoginController@login')->name('alumno.login.submit');
Route::get('/alumno/logout', 'Alumno\AlumnoLoginController@alumnoLogout')->name('alumno.logout');
//Ruta para el cambio de contraseña obligatorio para el primer inicio de sesión
Route::get('/alumno/update_password', 'Alumno\AlumnoController@password')->name('alumno.password');
Route::post('/alumno/update_password', 'Alumno\AlumnoController@updatepassword')->name('alumno.passwordupdate');
//Rutas del alumno menu,perfil
Route::group(['middleware' => ['changepassword']], function () {
Route::get('/alumno/menualumno', 'Alumno\AlumnoController@menu')->name('alumno.menu');
Route::get('/alumno/perfil-alumno', 'Alumno\AlumnoController@perfil')->name('alumno.perfil');
});

//Docente
//Rutas de inicio y cierre de sesión
Route::get('/docente/login', 'Docente\DocenteLoginController@showLoginForm')->name('docente.login');
Route::post('/docente/login', 'Docente\DocenteLoginController@login')->name('docente.login.submit');
Route::get('/docente/logout', 'Docente\DocenteLoginController@docenteLogout')->name('docente.logout');
///Ruta para el cambio de contraseña obligatorio para el primer incio de sesión de los docentes
Route::get('/docente/update_password', 'Docente\DocenteController@password')->name('docente.password');
Route::post('/docente/update_password', 'Docente\DocenteController@updatepassword')->name('docente.passwordupdate');
//Rutas del docente menu,perfil
Route::group(['middleware' => ['changepassword-docente']], function () {
Route::get('/docente/menudocente', 'Docente\DocenteController@menu')->name('docente.menu');
Route::get('/docente/perfil-docente', 'Docente\DocenteController@perfil')->name('docente.perfil');
});


