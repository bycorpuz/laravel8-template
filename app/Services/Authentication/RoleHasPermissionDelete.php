<?php

namespace App\Services\Authentication;

use Illuminate\Support\Facades\DB;

class RoleHasPermissionDelete
{
    public function execute($role_id, $permission_id)
    {
        $data = DB::table('role_has_permissions')
        ->where('role_id', '=', $role_id)
        ->where('permission_id', '=', $permission_id);

        if ($data->delete()){
            artisanClear();
            return response()->json(['success' => 'Selected permission in a role deleted successfully.']);
        } else {
            return response()->json(['error' => 'Selected permission in a role not deleted.']);
        }
    }
}