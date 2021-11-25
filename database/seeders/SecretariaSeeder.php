<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Secretaria;


class SecretariaSeeder extends Seeder
{
    /**
     * Run the database 'secretarias' table seeds.
     *
     * @return void
     */
    public function run()
    {
        // Static registers to be inserted on 'secretarias'
        $firstSecretary = new Secretaria();
        $firstSecretary->nombre = "Secretaría de Medio Ambiente";
        $firstSecretary->activa = 1;
        $firstSecretary->save();

        $firstSecretary = new Secretaria();
        $firstSecretary->nombre = "Secretaría General";
        $firstSecretary->activa = 1;
        $firstSecretary->save();
    }
}
