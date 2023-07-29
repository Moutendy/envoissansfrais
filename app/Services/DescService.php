<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\{descriptionModel};
use Illuminate\Support\Facades\DB;
/**
 * Class DescService
 * @package App\Services
 */
class DescService
{

    public function store(Request $request)
    {
        $descriptionModel = descriptionModel::create($request->all());
        if($descriptionModel)
        {
            return response(['message'=>'Save description.'],200);
        }
        return response(['message'=>'no Save description.'],400);
    }
     public function show()
    {
        $desc = descriptionModel::with('idUserAgency')->get();
        if($desc)
        {
            return response(['desc'=>$desc],200);
        }
    }
    public function showById($id)
    {
        $desc = descriptionModel::find($id);
        if($desc)
        {
            return response(['desc'=>$desc],200);
        }
        return response(['desc'=>'no Save description.'],401);
    }
    public function update(Request $request,$id)
    {
        $desc = descriptionModel::find($id);
        if($desc->update($request->all()))
        {
            return Response('success Update description',200);
        }

        return response(['desc'=>'no Update description.'],401);
    }

    public function delete($id)
    {
        $desc = descriptionModel::find($id);
        if($desc)
        {
            return response(['desc'=>descriptionModel::destroy($id)],200);
        }
        return response(['desc'=>'Description not found.'],401);
    }
}
