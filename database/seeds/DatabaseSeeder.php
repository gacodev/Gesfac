<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EscuadronTableSeeder::class);
        $this->call(TipoDocumentoTableSeeder::class);
        $this->call(NovedadesSeeder::class);
        $this->call(AlumnosTableSeeder::class);
        $this->call(TipoFusilTableSeeder::class);
        $this->call(ArmerilloSeeder::class);
        $this->call(AlumnoArmerilloTableSeeder::class);
        $this->call(VisitanteTableSeeder::class);
        $this->call(AlumnoVisitantesTableSeeder::class);
        $this->call(DoctorTableSeeder::class);
        $this->call(TipoCitaTableSeeder::class);
        $this->call(SanidadSolicitarTableSeeder::class);
        $this->call(SanidadAsignarTableSeeder::class);
        $this->call(SanidadIncapacidadTableSeeder::class);
        $this->call(NovedadesSeeder::class);
        $this->call(AlumnoNovedadSeeder::class);

    }
}
