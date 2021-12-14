<?php

namespace App\Services\Authentication;

use App\Models\ModelHasPermission;
use App\Models\Permission;
use App\Models\RoleHasPermission;

class PermissionDelete
{
    public function execute($id)
    {
        $data = Permission::findOrFail($id);
        $roleHasPermission = RoleHasPermission::where('permission_id', '=', $id)->count();

        if ($roleHasPermission < 1){
            $data->delete();
            artisanClear();
            return response()->json(['success' => 'Selected permission deleted successfully.']);
        } else {
            return response()->json(['error' => 'Not allowed to delete selected permission.']);
        }
    }
}