<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authentication\RoleCreateRequest;
use App\Models\Role;
use App\Services\Authentication\RoleDelete;
use App\Services\Authentication\RoleEdit;
use App\Services\Authentication\RoleList;
use App\Services\Authentication\RoleCreate;
use App\Services\Authentication\RoleUpdate;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        return view('authentication.role');
    }

    public function listroles(Request $request, RoleList $service){
        return $service->execute($request);
    }

    public function create(RoleCreateRequest $request, RoleCreate $service){
        return $service->execute($request);
    }

    public function edit(RoleEdit $service, $id){
        return $service->execute($id);
    }

    public function update(RoleCreateRequest $request, RoleUpdate $service){
        return $service->execute($request);
    }

    public function destroy(RoleDelete $service, $id){
        return $service->execute($id);
    }
}
