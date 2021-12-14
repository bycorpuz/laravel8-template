<?php

namespace App\Services\Authentication;

use Illuminate\Support\Facades\DB;

class RoleHasPermissionList
{
    public function execute($request)
    {
        $query = DB::table('role_has_permissions')
        ->select(
            'permission_id',
            'permissions.name AS permission_name',
            'role_id',
            'roles.name AS role_name',
        )
        ->leftJoin('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
        ->leftJoin('roles', 'role_has_permissions.role_id', '=', 'roles.id')
        ->orderBy('role_has_permissions.created_at', 'DESC');

        if($request->ajax())
        {
            return datatables()->of($query)
            ->addColumn('action', function($data){
                $button = '
                    <a class="btn btn-xs btn-danger bounceIn animated delete" id="'.$data->role_id.'/'.$data->permission_id.'"><i class="fa fa-trash-o"></i> Delete</a>
                ';

                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }
}