<?php

namespace App\Services\Authentication;

use App\Models\Role;

class RoleCreate
{
    public function execute($request)
    {
        $form_data = array(
            'name' => $request['name'],
            'guard_name' => 'web'
        );

        Role::create($form_data);
        artisanClear();

        return response()->json([
            'success' => 'Role added successfully.'
        ]);
    }
}