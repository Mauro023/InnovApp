<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Definir módulos y acciones
        $modules = [
            'user' => 'Administrador',
            'employees' => 'Empleado',
            'role' => 'Administrador',
            'userEmployees' => 'Administrador',
        ];

        $actions = ['view', 'show', 'create', 'update', 'destroy'];

        // Limpiar la tabla antes de insertar nuevos datos
        \DB::table('permissions')->delete();;

        // Generar permisos dinámicamente
        $permissions = [];

        foreach ($modules as $module => $category) {
            foreach ($actions as $action) {
                $permissions[] = [
                    'name' => "{$action}_{$module}",
                    'display_name' => $this->translateAction($action) . " " . ucfirst($category),
                    'guard_name' => 'web',
                    'category' => $category,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Agregar permisos adicionales
        $extraPermissions = [
            ['name' => 'roles', 'display_name' => 'Administrar roles', 'category' => 'Administrador'],
            ['name' => 'permission', 'display_name' => 'Administrar permisos', 'category' => 'Administrador'],
            ['name' => 'import_employees', 'display_name' => 'Importar empleados', 'category' => 'Empleado'],
        ];

        foreach ($extraPermissions as &$perm) {
            $perm['guard_name'] = 'web';
            $perm['created_at'] = now();
            $perm['updated_at'] = now();
        }

        // Insertar permisos en la base de datos
        Permission::insert(array_merge($permissions, $extraPermissions));
    }

    private function translateAction($action)
    {
        $translations = [
            'view' => 'Listar',
            'show' => 'Ver',
            'create' => 'Crear',
            'update' => 'Actualizar',
            'destroy' => 'Eliminar',
        ];

        return $translations[$action] ?? ucfirst($action);
    }
}
