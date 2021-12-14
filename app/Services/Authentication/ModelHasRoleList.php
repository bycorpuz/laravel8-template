<?php

namespace App\Services\Authentication;

use Illuminate\Support\Facades\DB;

class ModelHasRoleList
{
    public function execute($request)
    {
        $query = DB::table('model_has_roles')
        ->select(
            'model_has_roles.role_id',
            'model_has_roles.model_type',
            'model_has_roles.model_id',
            'model_has_roles.created_at',
            'roles.name AS role_name',
            'users.email AS user_email'
        )
        ->leftJoin('roles', 'roles.id', '=', 'model_has_roles.role_id')
        ->leftJoin('users', 'users.id', '=', 'model_has_roles.model_id')
        ->orderBy('model_has_roles.created_at', 'DESC');

        if($request->ajax())
        {
            return datatables()->of($query)
            ->addColumn('action', function($data){
                $button = '
                    <a class="btn btn-xs btn-danger bounceIn animated delete" id="'.$data->role_id.'/'.$data->model_id.'"><i class="fa fa-trash-o"></i> Delete</a>
                ';

                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }
}