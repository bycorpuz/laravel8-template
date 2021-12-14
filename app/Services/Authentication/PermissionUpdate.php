<?php

namespace App\Services\Authentication;

use App\Models\Permission;

class PermissionUpdate
{
    public function execute($request)
    {
        $form_data = array(
            'name' => $request['name'],
            'guard_name' => 'web'
        );

        Permission::whereId($request['hidden_id'])->update($form_data);
        artisanClear();

        return response()->json([
            'success' => 'Selected permission updated successfully.'
        ]);
    }
}