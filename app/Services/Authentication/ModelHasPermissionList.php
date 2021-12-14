<?php

namespace App\Services\Authentication;

use Illuminate\Support\Facades\DB;

class ModelHasPermissionList
{
    public function execute($request)
    {
        $query = DB::table('model_has_permissions')
        ->select(
            'model_has_permissions.permission_id',
            'model_has_permissions.model_type',
            'model_has_permissions.model_id',
            'model_has_permissions.created_at',
            'permissions.name AS permission_name',
            'users.email AS user_email',
        )
        ->leftJoin('permissions', 'permissions.id', '=', 'model_has_permissions.permission_id')
        ->leftJoin('users', 'users.id', '=', 'model_has_permissions.model_id')
        ->orderBy('model_has_permissions.created_at', 'DESC');

        if($request->ajax())
        {
            return datatables()->of($query)
            ->addColumn('action', function($data){
                $button = '
                    <a class="btn btn-xs btn-danger bounceIn animated delete" id="'.$data->permission_id.'/'.$data->model_id.'"><i class="fa fa-trash-o"></i> Delete</a>
                ';

                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }
}