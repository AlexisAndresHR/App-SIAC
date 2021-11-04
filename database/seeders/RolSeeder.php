<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;


class RolSeeder extends Seeder
{
    /**
     * Run the database roles table seeds.
     *
     * @return void
     */
    public function run()
    {
        // Static registers to roles_usuarios relation
        $firstRole = new Rol();
        $firstRole->nombre = "Administrador";
        $firstRole->descripcion = "Administrador SIAC";
        $firstRole->modulos_ids = "1,2,3,4,5";
        $firstRole->save();

        $secondRole = new Rol();
        $secondRole->nombre = "Secretaría";
        $secondRole->descripcion = "Usuario de Secretaría";
        $secondRole->modulos_ids = "2,4,5";
        $secondRole->save();

        $thirdRole = new Rol();
        $thirdRole->nombre = "Operacional";
        $thirdRole->descripcion = "Usuario de operación y captura de solicitudes";
        $thirdRole->modulos_ids = "3,4";
        $thirdRole->save();
    }
}
