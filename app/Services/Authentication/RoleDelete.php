<?php

namespace App\Services\Authentication;

use App\Models\ModelHasRole;
use App\Models\Role;

class RoleDelete
{
    public function execute($id)
    {
        $data = Role::find($id);
        $modelHasRole = ModelHasRole::where('role_id', '=', $id)->count();

        if ($modelHasRole < 1){
            $data->delete();
            artisanClear();
            return response()->json(['success' => 'Selected role deleted successfully.']);
        } else {
            return response()->json(['error' => 'Not allowed to delete selected role.']);
        }
    }
}