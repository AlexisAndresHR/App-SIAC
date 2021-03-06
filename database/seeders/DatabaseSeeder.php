<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(RolSeeder::class);// Calls the Rol Seeder to use it
        $this->call(SecretariaSeeder::class);// Calls the Secretaria Seeder to be able to execute it
        $this->call(DependenciaSeeder::class);// Calls the Dependencia Seeder to be able to execute it
    }
}
