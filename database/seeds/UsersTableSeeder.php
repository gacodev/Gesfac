<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\User::class, 20)->create();

        DB::table('users')->insert(array(
            'name' => 'gabriel',
            'email' => 'g.sarertnoc12@gmail.com',
            'password' => bcrypt('123456'),
        ));

        DB::table('users')->insert(array(
            'name' => 'luis',
            'email' => 'g.abox12@hotmail.com',
            'password' => bcrypt('123456'),
        ));

        DB::table('users')->insert(array(
            'name' => 'jr',
            'email' => 'jacerquera021@misena.edu.co',
            'password' => bcrypt('callefalsa123'),
        ));

        Role::create([
            'name'		=> 'Admin',
            'slug'  	=> 'slug',
            'special' 	=> 'all-access'
        ]);

        DB::table('role_user')->insert(array(
            'role_id' => 1,
            'user_id' => 1,
        ));

        DB::table('role_user')->insert(array(
            'role_id' => 1,
            'user_id' => 2,
        ));


    }
}
