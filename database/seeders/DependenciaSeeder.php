<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dependencia;


class DependenciaSeeder extends Seeder
{
    /**
     * Run the database 'dependencias' table seeds.
     *
     * @return void
     */
    public function run()
    {
        // Static registers to be inserted on 'dependencias'
        $firstDependency = new Dependencia();
        $firstDependency->nombre = "Ecología";
        $firstDependency->activa = 1;
        $firstDependency->secretaria_id = 1;
        $firstDependency->save();

        $firstDependency = new Dependencia();
        $firstDependency->nombre = "Limpieza y Recolección";
        $firstDependency->activa = 1;
        $firstDependency->secretaria_id = 2;
        $firstDependency->save();

        $firstDependency = new Dependencia();
        $firstDependency->nombre = "Innovación";
        $firstDependency->activa = 1;
        $firstDependency->secretaria_id = 2;
        $firstDependency->save();

        $firstDependency = new Dependencia();
        $firstDependency->nombre = "CAAMT";
        $firstDependency->activa = 1;
        $firstDependency->secretaria_id = 2;
        $firstDependency->save();
    }
}
