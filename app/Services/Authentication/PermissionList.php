<?php

namespace App\Services\Authentication;

use Illuminate\Support\Facades\DB;

class PermissionList
{
    public function execute($request)
    {
        $query = DB::table('permissions')->orderBy('created_at', 'DESC');
        if($request->ajax())
        {
            return datatables()->of($query)
            ->addColumn('action', function($data){
                $button = '
                    <a class="btn btn-xs btn-primary bounceIn animated edit" id="'.$data->id.'"><i class="fa fa-pencil-square-o"></i> Edit</a>
                ';
                $button .= '<p></p>';
                $button .= '
                    <a class="btn btn-xs btn-danger bounceIn animated delete" id="'.$data->id.'"><i class="fa fa-trash-o"></i> Delete</a>
                ';

                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }
}