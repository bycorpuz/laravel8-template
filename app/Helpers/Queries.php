<?php

use Illuminate\Support\Facades\DB;

function roleList()
{
    $query = DB::table('roles')->orderBy('created_at', 'DESC')->get();
    return $query;
}

function permissionList()
{
    $query = DB::table('permissions')->orderBy('created_at', 'DESC')->get();
    return $query;
}

function userList()
{
    $query = DB::table('users')->orderBy('created_at', 'DESC')->get();
    return $query;
}