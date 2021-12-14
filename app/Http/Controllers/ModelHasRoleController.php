<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authentication\ModelHasRoleRequest;
use App\Models\ModelHasRole;
use App\Services\Authentication\ModelHasRoleDelete;
use App\Services\Authentication\ModelHasRoleList;
use App\Services\Authentication\ModelHasRoleStore;
use Illuminate\Http\Request;


class ModelHasRoleController extends Controller
{   
    public function index(){
        return view('authentication.model-has-role');
    }

    public function listmodelhasroles(Request $request, ModelHasRoleList $service){
        return $service->execute($request);
    }

    public function create(ModelHasRoleRequest $request, ModelHasRoleStore $service){
        return $service->execute($request->all());
    }

    public function destroy(ModelHasRoleDelete $service, $role_id, $user_id){
        return $service->execute($role_id, $user_id);
    }
}
