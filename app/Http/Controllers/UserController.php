<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use App\Models\{User};
use Illuminate\Support\Facades\URL;
class UserController extends Controller
{

    private UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->userService->show();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return $this->userService->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return $this->userService->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return $this->userService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return $this->userService->delete($id);
    }
    public function gottoprofil()
    {
        return view('layouts.updateprofile');
    }
    public function updateprofil(Request $request)
    {
        $user = User::find(auth()->user()->id);
      $image_desc = $request['image_desc'];
      $image_profil =  $request['image_profil'];
      $path='app/public/users';
      if(!empty($request->file('image_desc')) && !empty($request->file('image_profil')))
      {

        $fileimage = $request->file('image_desc');
        $image_desc = $fileimage->getClientOriginalName();
        $request->file('image_desc')->move('storage\app\public\users',$image_desc);

        $image_profil = $request->file('image_profil');
        $image_profil = $image_profil->getClientOriginalName();
        $request->file('image_profil')->move('storage\app\public\users',$image_profil);

        $user->update([
            'image_desc' =>URL::to('/').'/storage/'.$path.'/'.$image_desc,
          ]);

          $user->update([
            'image_profil' =>URL::to('/').'/storage/'.$path.'/'.$image_profil,
          ]);
      }
      else if(!empty($request->file('image_desc')))
      {
        $path='app/public/users';
        $fileimage = $request->file('image_desc');
        $image_desc = $fileimage->getClientOriginalName();
        $request->file('image_desc')->move('storage\app\public\users',$image_desc);

        $user->update([
            'image_desc' =>URL::to('/').'/storage/'.$path.'/'.$image_desc,
          ]);

      } else if(!empty($request->file('image_profil')))
      {
        $path='app/public/users';
        $fileimage = $request->file('image_profil');
        $image_profil = $fileimage->getClientOriginalName();
        $request->file('image_profil')->move('storage\app\public\users',$image_profil);

        $user->update([
            'image_profil' => URL::to('/').'/storage/'.$path.'/'.$image_profil,
          ]);

      }
      return back();
    }
}
