<?php

use Illuminate\Database\Seeder;

use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        Permission::create([
            'name'          => 'Navegar usuarios',
            'slug'          => 'users.index',
            'description'   => 'Lista y navega todos los usuarios del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de usuario',
            'slug'          => 'users.show',
            'description'   => 'Ve en detalle cada usuario del sistema',
        ]);

        Permission::create([
            'name'          => 'Edición de usuarios',
            'slug'          => 'users.edit',
            'description'   => 'Podría editar cualquier dato de un usuario del sistema',
        ]);

        Permission::create([
            'name'          => 'Eliminar usuario',
            'slug'          => 'users.destroy',
            'description'   => 'Podría eliminar cualquier usuario del sistema',
        ]);

        //Roles
        Permission::create([
            'name'          => 'Navegar roles',
            'slug'          => 'roles.index',
            'description'   => 'Lista y navega todos los roles del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un rol',
            'slug'          => 'roles.show',
            'description'   => 'Ve en detalle cada rol del sistema',
        ]);

        Permission::create([
            'name'          => 'Creación de roles',
            'slug'          => 'roles.create',
            'description'   => 'Podría crear nuevos roles en el sistema',
        ]);

        Permission::create([
            'name'          => 'Edición de roles',
            'slug'          => 'roles.edit',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ]);

        Permission::create([
        'name'          => 'Eliminar roles',
        'slug'          => 'roles.destroy',
        'description'   => 'Podría eliminar cualquier rol del sistema',
    ]);
















        Permission::create([
            'name'          => 'asignar armamento',
            'slug'          => 'asignar_arm',
            'description'   => 'asignar armamento a cualquier alumno en la escuela',
        ]);

        Permission::create([
            'name'          => 'listar',
            'slug'          => 'listar',
            'description'   => 'listar alumnos en la escuela',
        ]);
        Permission::create([
            'name'          => 'listar',
            'slug'          => 'alumnos',
            'description'   => 'registrar alumnos',
        ]);
        Permission::create([
            'name'          => 'control de armerillo por parte del control alumnos',
            'slug'          => 'armas',
            'description'   => 'control del armerillo',
        ]);



        Permission::create([
            'name'          => 'asignacion de excusas',
            'slug'          => 'atendido',
            'description'   => 'acceso interfaz de asignacion de excusas',
        ]);


        Permission::create([
            'name'          => 'principal para uso de app',
            'slug'          => 'home',
            'description'   => 'acceso interfaz principal',
        ]);

        Permission::create([
            'name'          => 'informes',
            'slug'          => 'informes',
            'description'   => 'mostrar informes del sistema',
        ]);

        Permission::create([
            'name'          => 'ingreso',
            'slug'          => 'ingreso',
            'description'   => 'control personal que ingresa a la unidad por medio  del sistema',
        ]);

        Permission::create([
            'name'          => 'registro de alumnos',
            'slug'          => 'registrar_alumnos',
            'description'   => 'registrar alumnos del sistema',
        ]);

        Permission::create([
            'name'          => 'registro de armamento',
            'slug'          => 'registro_arm',
            'description'   => 'registrar armamento del sistema',
        ]);

        Permission::create([
            'name'          => 'registro de invitados',
            'slug'          => 'registro_inv',
            'description'   => 'registrar invitados del sistema',
        ]);

        Permission::create([
            'name'          => 'reportes',
            'slug'          => 'reportes',
            'description'   => 'generar reportes del sistema',
        ]);

        Permission::create([
            'name'          => 'control sanidad',
            'slug'          => 'sanidad',
            'description'   => 'control de citas y asignaciones',
        ]);

        Permission::create([
            'name'          => 'agendar citas',
            'slug'          => 'agendar_cita',
            'description'   => 'agendar citas alumnos',
        ]);

        
    }
}
