<?php

namespace App\Services\Authentication;

use App\Models\ModelHasPermission;
use Illuminate\Support\Facades\DB;

class ModelHasPermissionStore
{
    public function execute($request)
    {
        $saveCounter = 0;
        $permissions = $request['permission_id'];
        $users = $request['model_id'];

        foreach($permissions as $permission){
            foreach($users as $user){
                $model = new ModelHasPermission();
                $model->permission_id = $permission;
                $model->model_type = 'App\Models\User';
                $model->model_id = $user;
    
                $query = DB::table('model_has_permissions')
                ->where('permission_id', '=', $permission)
                ->where('model_id', '=', $user)
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
            return response()->json(['success' => 'Permission assigned to a user successfully.']);
        } else {
            artisanClear();
            return response()->json(['error' => 'User has permission already.']);
        }
    }
}