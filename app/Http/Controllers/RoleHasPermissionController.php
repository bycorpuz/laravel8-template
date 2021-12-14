<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authentication\RoleHasPermissionRequest;
use Illuminate\Http\Request;
use App\Models\RoleHasPermission;
use App\Services\Authentication\RoleHasPermissionDelete;
use App\Services\Authentication\RoleHasPermissionList;
use App\Services\Authentication\RoleHasPermissionStore;

class RoleHasPermissionController extends Controller
{   
    public function index(){
        return view('authentication.role-has-permission');
    }

    public function listrolehaspermissions(Request $request, RoleHasPermissionList $service){
        return $service->execute($request);
    }

    public function create(RoleHasPermissionRequest $request, RoleHasPermissionStore $service){
        return $service->execute($request->all());
    }

    public function destroy(RoleHasPermissionDelete $service, $role_id, $permission_id){
        return $service->execute($role_id, $permission_id);
    }
}
