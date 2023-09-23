<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\{validationModel};
use Illuminate\Support\Facades\DB;
/**
 * Class ValidationService
 * @package App\Services
 */
class ValidationService
{

    public function store($request)
    {

        if($request)
        {
            $validation = validationModel::create([
                'desc' => $request['desc'],
                'transaction_model' => $request['id']
            ]);
            return response(['message'=>'Save validation.', $validation],200);
        }
        return response(['message'=>'not Save validation.'],400);
    }
     public function show()
    {
        $validationModel = validationModel::orderBy('created_at', 'desc')->get();
        if($validationModel)
        {
            return response(['validation'=>$validationModel],200);
        }
    }
    public function showById($id)
    {
        $validationModel = validationModel::find($id);
        if($validationModel)
        {
            return response(['validation'=>$validationModel],200);
        }
        return response(['validation'=>'not Save validation.'],401);
    }
    public function update(Request $request,$id)
    {
        $validationModel = validationModel::find($id);
        if(!$validationModel)
        {
            return Response('table validation with '.$id.' not found',401);
        }
        if($validationModel->update($request->all()))
        {
            return Response('success Update validation',200);
        }



        return response(['validation'=>'not Update validation.'],401);
    }

    public function delete($id)
    {
        $validationModel = validationModel::find($id);
        if($validationModel)
        {
            return response(['validation'=>validationModel::destroy($id)],200);
        }
        return response(['validation'=>'validation not found.'],401);
    }
    public function showAgencier()
    {
        return DB::select('SELECT ts.start as startdate,ts.end,ts.accept_transaction ,ts.desc , rl.name as rolename, us.email,us.image_profil,us.name,us.id,us.tel,vt.desc FROM `users` as us join validation_models as vt on vt.user_agencier = us.id join role_models as rl on rl.id = us.role_model join transaction_models as ts on ts.id = vt.transaction_model where us.id = 2');
    }
}
