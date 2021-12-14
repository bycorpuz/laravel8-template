<?php

namespace App\Services\Authentication;

use App\Models\Permission;

class PermissionStore
{
    public function execute($request)
    {
        $form_data = array(
            'name' => $request['name'],
            'guard_name' => 'web'
        );

        Permission::create($form_data);
        artisanClear();

        return response()->json([
            'success' => 'Permission added successfully.'
        ]);
    }
}