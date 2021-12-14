<?php

namespace App\Services\Authentication;

use App\Models\Role;

class RoleEdit
{
    public function execute($id)
    {
        if(request()->ajax())
        {
            $data = Role::find($id);
            return response()->json(['data' => $data]);
        }
    }
}