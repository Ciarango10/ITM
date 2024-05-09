<?php

namespace App\Helpers;

use App\Models\Permission;
use Illuminate\Support\Facades\Auth;


class RoleHelper {

    public static function isAuthorized($permission) {

        try {

            if (RoleHelper::currentUserIsAdmin()) {

                return true;
            }

            $userId = Auth::user()->id;

            $temp = explode('.', $permission);
            $module = $temp[0];
            $permission = $temp[1];

            $permission = Permission::select('permissions.id')
                                    ->join('role_permissions', 'permissions.id', 'role_permissions.permission_id')
                                    ->join('roles', 'role_permissions.role_id', 'roles.id')
                                    ->join('users', 'roles.id', 'users.role_id')
                                    ->where('permissions.module', '=', $module)
                                    ->where('permissions.name', $permission)
                                    ->where('users.id', '=', $userId)
                                    ->first();

            return $permission != null;

        } catch (\Exception $ex) {

            dd($ex);
        }
    }

    public static function currentUserIsAdmin() {

        try {

            $role = Auth::user()->role->name;

            return $role == 'Administrador';

        } catch (\Exception $ex) {

            dd($ex);
        }
    }
}