<?php

namespace App\Services\Authentication;

use Illuminate\Support\Facades\DB;

class ModelHasRoleDelete
{
    public function execute($role_id, $user_id)
    {
        $data = DB::table('model_has_roles')
        ->where('role_id', '=', $role_id)
        ->where('model_id', '=', $user_id);

        if ($data->delete()){
            artisanClear();
            return response()->json(['success' => 'Selected role deleted to a user successfully.']);
        } else {
            return response()->json(['error' => 'Selected role to a user not deleted.']);
        }
    }
}