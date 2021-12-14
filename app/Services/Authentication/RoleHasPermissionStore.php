<?php

namespace App\Services\Authentication;

use App\Models\RoleHasPermission;
use Illuminate\Support\Facades\DB;

class RoleHasPermissionStore
{
    public function execute($request)
    {
        $saveCounter = 0;
        $roles = $request['role_id'];
        $permissions = $request['permission_id'];

        foreach($roles as $role){
            foreach($permissions as $permission){
                $model = new RoleHasPermission();
                $model->role_id = $role;
                $model->permission_id = $permission;
    
                $query = DB::table('role_has_permissions')
                ->where('role_id', '=', $role)
                ->where('permission_id', '=', $permission)
                ->get();
                if (count($query) == 0) {
                    if ($model->save()){
                        $saveCounter += 1;
                        artisanClear();
                    }
                }
            }
        }

        if ($saveCounter > 0){
            artisanClear();
            return response()->json(['success' => 'Permission added in a role successfully.']);
        } else {
            artisanClear();
            return response()->json(['error' => 'Permission already in a role.']);
        }
    }
}