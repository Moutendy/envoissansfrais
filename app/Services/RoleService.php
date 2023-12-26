<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\{roleModel};
use Illuminate\Support\Facades\DB;
/**
 * Class RoleService
 * @package App\Services
 */
class RoleService
{

    public function store(Request $request)
    {
        roleModel::create(['name'=>$request['name']]);
        return response(['message'=>'save Role.'],404);
    }
    public function show()
    {

        return DB::select('SELECT * FROM `role_models` WHERE id not in(1)');
    }
    public function showById($id)
    {
        $role = roleModel::find($id);
        if(!$role)
        {
            return response(['message'=>'Role not found.'],404);
        }
       return $role;
    }
    public function update(Request $request,$id)
    {
        $role = roleModel::find($id);
        if(!$role)
        {
            return response(['message'=>'Role not found.'],404);
        }
        $role->update(['name'=>$request['name'],]);
        return response(['message'=>'role updated.'] ,201);
    }
    public function delete($id)
    {
        $role=roleModel::find($id);
        if(!$role)
        {
            return response(['message'=>'Role not found.'],404);
        }
        $role->delete();
        return response(['message'=>'Role delete',200]);
    }
}
