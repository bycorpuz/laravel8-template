<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authentication\PermissionStoreRequest;
use App\Models\Permission;
use App\Services\Authentication\PermissionDelete;
use App\Services\Authentication\PermissionList;
use App\Services\Authentication\PermissionStore;
use App\Services\Authentication\PermissionUpdate;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(){
        return view('authentication.permission');
    }

    public function listpermissions(Request $request, PermissionList $service){
        return $service->execute($request);
    }

    public function create(PermissionStoreRequest $request, PermissionStore $service){
        return $service->execute($request->all());
    }

    public function edit($id){
        if(request()->ajax())
        {
            $data = Permission::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public function update(PermissionStoreRequest $request, PermissionUpdate $service){
        return $service->execute($request->all());
    }

    public function destroy(PermissionDelete $service, $id){
        return $service->execute($id);
    }
}
