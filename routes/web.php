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
//Creación del horario
Route::get('/admin/materias/{id}/{string}', 'Admin\AdminController@getMaterias');
Route::get('/admin/horario', 'Admin\AdminController@horario')->name('admin.horario');
Route::post('/admin/horario', 'Admin\AdminController@createhorario')->name('admin.horario_store');
//Consultar horario
Route::get('/admin/consultarhorario', 'Admin\AdminController@consultarhorario')->name('admin.consultarhorario');
//Editar y actualizar horario
Route::get('/admin/{id}/editHorario', 'Admin\AdminController@editHorario')->name('admin.editHorarios');
Route::put('/admin/{id}/editHorario', 'Admin\AdminController@updateHorario')->name('admin.updateHorarios');
//Eliminar horario
Route::get('/admin/{id}/borrarHorario', 'Admin\AdminController@borrarHorario')->name('admin.borrarHorarios');
//Rutas licenciatura
//crear
Route::get('/admin/datosLicenciatura', 'Admin\AdminController@createLicenciatura')->name('admin.createLicenciatura');
Route::post('/admin/datosLicenciatura', 'Admin\AdminController@storeLicenciatura')->name('admin.storeDatos');
//Consultar
Route::get('/admin/consultarDatos', 'Admin\AdminController@consultartDatosLicenciatura')->name('admin.consutarDatosLicenciatura');
//EditarCiclo y actualizar
Route::get('/admin/{id}/editDatos', 'Admin\AdminController@editDatos')->name('admin.editDatos');
Route::put('/admin/{id}/editDatos', 'Admin\AdminController@updateDatos')->name('admin.updateDatos');
//Editar Licenciatura y actualizar
Route::get('/admin/{id}/editLic', 'Admin\AdminController@editLic')->name('admin.editLic');
Route::put('/admin/{id}/editLic', 'Admin\AdminController@updateLic')->name('admin.updateLic');
//Editar Grupos y actualizar
Route::get('/admin/{id}/editGrup', 'Admin\AdminController@editGrup')->name('admin.editGrup');
Route::put('/admin/{id}/editGrup', 'Admin\AdminController@updateGrup')->name('admin.updateGrup');
//Editar Materias y actualizar
Route::get('/admin/{id}/editMat', 'Admin\AdminController@editMat')->name('admin.editMat');
Route::put('/admin/{id}/editMat', 'Admin\AdminController@updateMat')->name('admin.updateMat');

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
Route::get('/alumno/{id}/perfil-alumno', 'Alumno\AlumnoController@perfilAlumno')->name('alumno.perfilAlumno');
//Ruta del horario
Route::get('/alumno/{id}/horario', 'Alumno\AlumnoController@horarioAlumno')->name('alumno.horarioAlumno');

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
//Ruta de su horario con sus grupos
Route::get('/docente/{id}/horario', 'Docente\DocenteController@horarioGrupo')->name('docente.gruposDocente');
//Ruta para ver los grupos que tiene 
Route::get('/docente/{id}/grupos', 'Docente\DocenteController@grupos')->name('docente.grupos');
});


