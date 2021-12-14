<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authentication\ModelHasPermissionRequest;
use App\Models\ModelHasPermission;
use App\Services\Authentication\ModelHasPermissionDelete;
use App\Services\Authentication\ModelHasPermissionList;
use App\Services\Authentication\ModelHasPermissionStore;
use Illuminate\Http\Request;

class ModelHasPermissionController extends Controller
{   
    public function index(){
        return view('authentication.model-has-permission');
    }

    public function listmodelhaspermissions(Request $request, ModelHasPermissionList $service){
        return $service->execute($request);
    }

    public function create(ModelHasPermissionRequest $request, ModelHasPermissionStore $service){
        return $service->execute($request->all());
    }

    public function destroy(ModelHasPermissionDelete $service, $permission_id, $user_id){
        return $service->execute($permission_id, $user_id);
    }
}
