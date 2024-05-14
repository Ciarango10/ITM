<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [

            // Secciones
            ["name" => "showSections", "description" => "Ver Secciones", "module" => "Secciones"],
            ["name" => "createSections", "description" => "Crear Secciones", "module" => "Secciones"],
            ["name" => "updateSections", "description" => "Editar Secciones", "module" => "Secciones"],
            ["name" => "deleteSections", "description" => "Eliminar Secciones", "module" => "Secciones"],

            // Blogs
            ["name" => "showBlogs", "description" => "Ver Blogs", "module" => "Blogs"],
            ["name" => "createBlogs", "description" => "Crear Blogs", "module" => "Blogs"],
            ["name" => "updateBlogs", "description" => "Editar Blogs", "module" => "Blogs"],
            ["name" => "deleteBlogs", "description" => "Eliminar Blogs", "module" => "Blogs"],

            // Roles
            ["name" => "showRoles", "description" => "Ver Roles", "module" => "Roles"],
            ["name" => "createRoles", "description" => "Crear Roles", "module" => "Roles"],
            ["name" => "updateRoles", "description" => "Editar Roles", "module" => "Roles"],
            ["name" => "deleteRoles", "description" => "Eliminar Roles", "module" => "Roles"],

            // Usuarios
            ["name" => "showUsers", "description" => "Ver Usuarios", "module" => "Users"],
            ["name" => "createUsers", "description" => "Crear Usuarios", "module" => "Users"],
            ["name" => "updateUsers", "description" => "Editar Usuarios", "module" => "Users"],
            ["name" => "deleteUsers", "description" => "Eliminar Usuarios", "module" => "Users"],
        ];

        foreach($list as $item) {

            $permission = Permission::where('name', '=', $item['name'])
                                    ->where('module', '=', $item['module'])
                                    ->first();

            if (empty($permission)) {

                $newPermission = new Permission();
                $newPermission->name = $item['name'];
                $newPermission->description = $item['description'];
                $newPermission->module = $item['module'];
                $newPermission->save();
            }
        }
    }
}
