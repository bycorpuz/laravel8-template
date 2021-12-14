<?php

namespace App\Services\Authentication;

use App\Models\ModelHasRole;
use Illuminate\Support\Facades\DB;

class ModelHasRoleStore
{
    public function execute($request)
    {
        $artu = $request['model_id'];
        $saveCounter = 0;
        foreach($artu as $user_id){
            $model = new ModelHasRole();
            $model->role_id = $request['role_id'];
            $model->model_type = 'App\Models\User';
            $model->model_id = $user_id;

            $query = DB::table('model_has_roles')
            ->where('role_id', '=', $request['role_id'])
            ->where('model_id', '=', $user_id)
            ->get();
            if (count($query) == 0) {
                if ($model->save()){
                    $saveCounter += 1;
                    artisanClear();
                }
            }
        }
        if ($saveCounter > 0){
            artisanClear();
            return response()->json(['success' => 'Role assigned to a user successfully.']);
        } else {
            artisanClear();
            return response()->json(['error' => 'User has role already.']);
        }
    }
}