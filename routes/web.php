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



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/armas-export', 'exportcontroller@exportarmas')->name('armas-export');
Route::get('/personal-export', 'exportcontroller@exportpersonal')->name('personal-export');
Route::get('/sanidad-export', 'exportcontroller@exportsanidad')->name('sanidad-export');


Route::get('/welcome', 'HomeController@welcome')->name('welcome');
Route::get('/armamento', 'AlumnoController@arm')->name('registro_arm');
Route::get('/asignar_arm', 'AlumnoController@asignar_arm')->name('asignar_arm');
Route::post('/asignar_fusil', 'AlumnoController@asignar_fusil');

Route::get('/listar', 'AlumnoController@listar')->name('listar');
Route::post('/actualizar_novedad', 'AlumnoController@actualizar_novedad')->name('actualizar_novedad');
Route::post('/actualizar_excusa', 'AlumnoController@actualizar_excusa')->name('actualizar_excusa');

Route::post('/contar_novedades', 'AlumnoController@contar_novedades')->name('contar_novedades');


Route::post('/desvincular_fusil', 'AlumnoController@desvincular_fusil');
Route::post('import-armas', 'ReportesController@importarmas')->name('excel');
Route::post('import-visitantes', 'ReportesController@visitantes')->name('visitante');
Route::get('export-sanidad-pdf', 'UserController@sanidad')->name('export-sanidad-pdf');
Route::get('export-armas-pdf', 'UserController@armas')->name('export-armas-pdf');
Route::get('export-personal-pdf', 'UserController@personal')->name('export-personal-pdf');
Route::get('/invitados', 'VisitanteController@visitantes')->name('registro_inv');
Route::post('/alumnos_por_escuadron', 'AlumnoController@show_per_squadron');
Route::post('/registrar_visitante', 'VisitanteController@create');
Route::post('/consultar_armas_disponibles', 'ArmerilloController@weaponAvailable');


Route::get('/armas', 'AlumnoController@show')->name('armas');
Route::get('/ingreso', 'AlumnoController@ingreso')->name('ingreso');
Route::get('/borrado', 'AlumnoController@truncate')->name('truncate');
Route::get('/reportes', 'AlumnoController@reportes')->name('reportes');
Route::get('/totalWeapons', 'AlumnoController@total_weapons')->name('total_weapons');
Route::get('/registrar_alumno', 'AlumnoController@registrar_alumno')->name('registrar_alumno');
Route::post('/registrar_alumno', 'AlumnoController@crear_alumno')->name('crear_alumno');
Route::post('/actualizarEstadoArmas', 'AlumnoController@update', 'AlumnoController@contar')->name('actualizar_armas');


Route::get('/informes', 'SanidadController@informes')->name('informes');
Route::get('/sanidad', 'SanidadController@index')->name('sanidad');
Route::get('/agendar', 'SanidadController@agendarCita')->name('agendarCita');
Route::post('/informacion_solicitud_cita', 'SanidadController@informacionSolicitudCita');
Route::post('/asignar_cita', 'SanidadController@asignar_cita');
Route::post('/agendar_cita', 'SanidadController@create');
Route::get('atendido/{cita?}','SanidadController@atendido');
Route::post('/registrar_atencion_citas','SanidadController@registrar_atencion_citas');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
	//Roles
	Route::post('roles/store', 'RoleController@store')->name('roles.store')
		->middleware('can:roles.create');

	Route::get('roles', 'RoleController@index')->name('roles.index')
		->middleware('can:roles.index');

	Route::get('roles/create', 'RoleController@create')->name('roles.create')
		->middleware('can:roles.create');

	Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
		->middleware('can:roles.edit');

	Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
		->middleware('can:roles.show');

	Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
		->middleware('can:roles.destroy');

	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
		->middleware('can:roles.edit');
	//Users
	Route::get('users', 'UserController@index')->name('users.index')
		->middleware('can:users.index');

	Route::put('users/{user}', 'UserController@update')->name('users.update')
		->middleware('can:users.edit');

	Route::get('users/{user}', 'UserController@show')->name('users.show')
		->middleware('can:users.show');

	Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
		->middleware('can:users.destroy');

	Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
		->middleware('can:users.edit');
});
