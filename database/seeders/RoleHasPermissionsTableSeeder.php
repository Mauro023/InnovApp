<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleHasPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtiene el rol "Administrador"
        $adminRole = Role::findById(1);

        // IDs de los permisos a asignar
        $permissionIds = range(1, 23);

        // Asigna permisos al rol Administrador
        $adminRole->syncPermissions($permissionIds);
    }
}
