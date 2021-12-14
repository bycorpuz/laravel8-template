<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function findRoles(Request $request)
    {
        $roles = trim($request->q);

        if (empty($roles)) {
            return Response::json([]);
        }

        $roles = Role::search($roles)->limit(5)->get();

        $formatted_roles = [];

        foreach ($roles as $role) {
            $formatted_roles[] = ['id' => $role->id, 'text' => $role->name];
        }

        return Response::json($formatted_roles);
    }

    public function findPermissions(Request $request)
    {
        $permissions = trim($request->q);

        if (empty($permissions)) {
            return Response::json([]);
        }

        $permissions = Permission::search($permissions)->limit(5)->get();

        $formatted_permissions = [];

        foreach ($permissions as $permission) {
            $formatted_permissions[] = ['id' => $permission->id, 'text' => $permission->name];
        }

        return Response::json($formatted_permissions);
    }
}
