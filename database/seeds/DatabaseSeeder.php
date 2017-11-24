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
        Eloquent::unguard();
        Schema::disableForeignKeyConstraints();

        $this->call('RolesTableSeeder');
        $this->call('RegistrosTableSeeder');
        $this->call('UsuariosTableSeeder');
        $this->call('ProvinciasTableSeeder');
        $this->call('TiposTramiteTableSeeder');
        $this->call('EstadosTramiteTableSeeder');
        $this->call('TiposVehiculoTableSeeder');
        $this->call('JurisdiccionesTableSeeder');

        Schema::enableForeignKeyConstraints();
    }
}
