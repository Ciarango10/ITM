<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        $adminRole = new Role();
        $adminRole->name = "Administrador";
        $adminRole->save();

        // Blogs role
        $blogsPermissions = Permission::where('module', '=', 'Blogs')
                                      ->get();

        $blogsRole = new Role();
        $blogsRole->name = "Editor de Blogs";
        $blogsRole->save();

        foreach($blogsPermissions as $permission) {

            $rolePermission = new RolePermission();
            $rolePermission->role_id = $blogsRole->id;
            $rolePermission->permission_id = $permission->id;
            $rolePermission->save();
        }

        // Sections role
        $seccionesPermissions = Permission::where('module', '=', 'Secciones')
                                          ->get();
        $seccionesRole = new Role();
        $seccionesRole->name = "Editor de secciones";
        $seccionesRole->save();

        foreach($seccionesPermissions as $permission) {

            $rolePermission = new RolePermission();
            $rolePermission->role_id = $seccionesRole->id;
            $rolePermission->permission_id = $permission->id;
            $rolePermission->save();
        }

        // Content manager role
        $editorPermissions = $blogsPermissions->merge($seccionesPermissions);;

        $editorRole = new Role();
        $editorRole->name = "Editor de contenido";
        $editorRole->save();

        foreach($editorPermissions as $permission) {

            $rolePermission = new RolePermission();
            $rolePermission->role_id = $editorRole->id;
            $rolePermission->permission_id = $permission->id;
            $rolePermission->save();
        }

        // Users

        $user = new User();
        $user->first_name = "Manuel";
        $user->last_name = "Dominguez";
        $user->document = "11111";
        $user->email = "manueld@yopmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->role_id = $adminRole->id;
        $user->save();

        $user = new User();
        $user->first_name = "John";
        $user->last_name = "Doe";
        $user->document = "22222";
        $user->email = "jhond@yopmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->role_id = $editorRole->id;
        $user->save();

        $user = new User();
        $user->first_name = "Ana";
        $user->last_name = "Doe";
        $user->document = "33333";
        $user->email = "anad@yopmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->role_id = $seccionesRole->id;
        $user->save();
    }
}
