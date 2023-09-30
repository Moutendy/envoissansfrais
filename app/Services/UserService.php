<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\{User};

/**
 * Class UserService
 * @package App\Services
 */
class UserService
{


    public function store(Request $request)
    {

        $userModel = User::create($request->all());
        if($userModel)
        {
            return response(['message'=>'Save user.'],200);
        }
        return response(['message'=>'no Save user.'],400);
    }
     public function show()
    {
        $user = User::orderBy('created_at', 'desc')->with('posts:id')->get();
        if($user)
        {
            return response(['user'=>$user],200);
        }
    }
    public function showById($id)
    {
        $user = User::find($id);
        if($user)
        {
            return response($user);
        }
        return response(['user'=>'no Save user.'],401);
    }
    public function update(Request $request,$id)
    {
        $user = User::find($id);
        if($user->update($request->all()))
        {
            return Response('success Update user',200);
        }

        return response(['user'=>'no Update user.'],401);
    }

    public function delete($id)
    {
        $user = User::find($id);
        if($user)
        {
            return response(['user'=>User::destroy($id)],200);
        }
        return response(['user'=>'user not found.'],401);
    }

    public function showUser()
    {

        return User::orderBy('created_at', 'desc')->get();

    }
}
