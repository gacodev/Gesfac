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




//	filtro para acceder a las rutas

    Route::get('/armas-export', 'exportcontroller@exportarmas')->name('armas-export')
    ->middleware('can:armas-export');

    Route::get('/personal-export', 'exportcontroller@exportpersonal')->name('personal-export')
    ->middleware('can:personal-export');

    Route::get('/sanidad-export', 'exportcontroller@exportsanidad')->name('sanidad-export')
    ->middleware('can:sanidad-export');

    Route::get('/welcome', 'HomeController@welcome')->name('welcome')
    ->middleware('can:welcome');

    Route::get('/armamento', 'AlumnoController@arm')->name('registro_arm')
    ->middleware('can:registro_arm');

    Route::get('/asignar_arm', 'AlumnoController@asignar_arm')->name('asignar_arm')
    ->middleware('can:asignar_arm');

    Route::post('/asignar_fusil', 'AlumnoController@asignar_fusil')->name('asignar')
    ->middleware('can:asignar');

    Route::get('/listar', 'AlumnoController@listar')->name('listar')
    ->middleware('can:listar');

    Route::post('/actualizar_novedad', 'AlumnoController@actualizar_novedad')->name('actualizar_novedad')
    ->middleware('can:actualizar_novedad');

    Route::post('/actualizar_excusa', 'AlumnoController@actualizar_excusa')->name('actualizar_excusa')
    ->middleware('can:actualizar_excusa');

    Route::post('/contar_novedades', 'AlumnoController@contar_novedades')->name('contar_novedades')
    ->middleware('can:contar_novedades');

    Route::post('/desvincular_fusil', 'AlumnoController@desvincular_fusil')->name('desvincular')
    ->middleware('can:desvincular');

    Route::post('import-armas', 'ReportesController@importarmas')->name('excel')
    ->middleware('can:excel');

    Route::post('import-visitantes', 'ReportesController@visitantes')->name('visitante')
    ->middleware('can:visitante');

    Route::get('export-sanidad-pdf', 'UserController@sanidad')->name('export-sanidad-pdf')
    ->middleware('can:export-sanidad-pdf');

    Route::get('export-armas-pdf', 'UserController@armas')->name('export-armas-pdf')
    ->middleware('can:export-armas-pdf');

    Route::get('export-personal-pdf', 'UserController@personal')->name('export-personal-pdf')
    ->middleware('can:export-personal-pdf');

    Route::get('/invitados', 'VisitanteController@visitantes')->name('registro_inv')
    ->middleware('can:registro_inv');

    Route::post('/alumnos_por_escuadron', 'AlumnoController@show_per_squadron')->name('alumnosporescuadron')
    ->middleware('can:alumnosporescuadron');

    Route::post('/registrar_visitante', 'VisitanteController@create')->name('registrarvisitante')
    ->middleware('can:registrarvisitante');

    Route::post('/consultar_armas_disponibles', 'ArmerilloController@weaponAvailable')->name('armasdisponibles')
        ->middleware('can:armasdisponibles');

    Route::get('/armas', 'AlumnoController@show')->name('armas')
    ->middleware('can:armas');

    Route::get('/ingreso', 'AlumnoController@ingreso')->name('ingreso')
    ->middleware('can:ingreso');

    Route::get('/borrado', 'AlumnoController@truncate')->name('truncate')
        ->middleware('can:truncate');

    Route::get('/reportes', 'AlumnoController@reportes')->name('reportes')
    ->middleware('can:reportes');

    Route::get('/totalWeapons', 'AlumnoController@total_weapons')->name('total_weapons')
    ->middleware('can:total_weapons');

    Route::get('/registrar_alumno', 'AlumnoController@registrar_alumno')->name('registrar_alumno')
    ->middleware('can:registrar_alumno');

    Route::post('/registrar_alumno', 'AlumnoController@crear_alumno')->name('crear_alumno')
    ->middleware('can:crear_alumno');

    Route::post('/actualizarEstadoArmas', 'AlumnoController@update', 'AlumnoController@contar')->name('actualizar_armas')
        ->middleware('can:actualizar_armas');

    Route::get('/informes', 'SanidadController@informes')->name('informes')
    ->middleware('can:informes');

    Route::get('/sanidad', 'SanidadController@index')->name('sanidad')
    ->middleware('can:sanidad');

    Route::get('/agendar', 'SanidadController@agendarCita')->name('agendarCita')
    ->middleware('can:agendarCita');

    Route::post('/informacion_solicitud_cita', 'SanidadController@informacionSolicitudCita')->name('solicitar_cita')
        ->middleware('can:solicitar_cita');

    Route::post('/asignar_cita', 'SanidadController@asignar_cita')->name('asignarcita')
        ->middleware('can:asignarcita');

    Route::post('/agendar_cita', 'SanidadController@create')->name('crear_cita')
        ->middleware('can:crear_cita');

    Route::get('atendido/{cita?}','SanidadController@atendido')->name('atendido')
        ->middleware('can:atendido');

    Route::post('/registrar_atencion_citas','SanidadController@registrar_atencion_citas')->name('registrar_atencion')
        ->middleware('can:registrar_atencion');

});





