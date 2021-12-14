<?php

namespace App\Services\Authentication;

use Illuminate\Support\Facades\DB;

class ModelHasPermissionDelete
{
    public function execute($permission_id, $user_id)
    {
        $data = DB::table('model_has_permissions')
        ->where('permission_id', '=', $permission_id)
        ->where('model_id', '=', $user_id);

        if ($data->delete()){
            artisanClear();
            return response()->json(['success' => 'Selected permission deleted to a user successfully.']);
        } else {
            return response()->json(['error' => 'Selected permission to a user not deleted.']);
        }
    }
}