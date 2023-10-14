<?php

namespace App\Services;
use App\Models\PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Services\ImageService;
use Illuminate\Support\Facades\DB;
/**
 * Class PostService
 * @package App\Services
 */
class PostService
{


    protected ImageService $imageService;
    public $fb;
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index()
    {
      //  return DB::select('SELECT * FROM `post_models` WHERE `user`=:user', ['ville'=>$user]);

        $post = PostModel::orderBy('created_at', 'desc')->with('user:id,name,image_profil,tel,role_model')->get();
        return response($post, 201);
    }

    public function store(Request $request)
    {
        $attrs = $request->validate([
            'desc' => 'required|string',
        ]);
        if(!Empty($request->file('image'))){


            $path='app/public/posts';
            $fileimage = $request->file('image');
            $nameimage = $fileimage->getClientOriginalName();
            $request->file('image')->move('storage\app\public\posts',$nameimage);

    }
        $post = PostModel::create([
            'desc' => $attrs['desc'],
            'user' => auth()->user()->id,
            'image' => URL::to('/').'/storage/'.$path.'/'.$nameimage,
        ]);

        if(!empty($post))
        {

            return back();
        }
        return back();
    }


    public function update(Request $request, $id)
    {
        $post = PostModel::find($id);



        if(!Empty($request->file('image')) && !Empty($request->desc))
        {
            $path='app/public/posts';
            $fileimage = $request->file('image');
            $nameimage = $fileimage->getClientOriginalName();
            $request->file('image')->move('storage\app\public\posts',$nameimage);

            $post->update(['image'=>URL::to('/').'/storage/'.$path.'/'.$nameimage,
           'desc'=>$request->desc]);
        }
        else   if(!Empty($request->file('image'))){


                $path='app/public/posts';
                $fileimage = $request->file('image');
                $nameimage = $fileimage->getClientOriginalName();
                $request->file('image')->move('storage\app\public\posts',$nameimage);

                $post->update(['image'=>URL::to('/').'/storage/'.$path.'/'.$nameimage]);
        }
        else if(!Empty($request->desc)){
            $post->update([
            'desc'=>$request->desc]);
        }
        return back()->with('success', 'Image Ajouter!');
    }

    public function destroy($id)
    {
        $post = PostModel::find($id);
        if (!$post) {
            return response(['message' => 'Aucun post avec cette id.'], 404);
        }
        if ($post->user != auth()->user()->id) {
            return response(['message' => 'Permission denied.'], 403);
        }
        if ($post->user == auth()->user()->id) {
            $post->delete();
            return response(['message' => 'post supprimé'], 201);
        }
        return response(['message' => auth()->user()->id], 201);
    }


    public function show($id)
    {
        $post = PostModel::find($id);
        if (!$post) {
            return response(['message' => 'Aucun post avec cette id.'], 404);
        }
        if ($post->user != auth()->user()->id) {
            return response(['message' => 'Permission denied.'], 403);
        }
        if ($post->user == auth()->user()->id) {

            return response($post, 201);
        }
        return response(['message' => auth()->user()], 201);
    }
    public function postByUser()
    {
        return DB::select('SELECT ps.id ,ps.image as image_post,ps.created_at ,ps.desc , us.email,us.image_profil,us.name,us.tel FROM `users` as us join post_models as ps on ps.user = us.id where us.id = :id',['id'=>auth()->user()->id]);
    }

    public function postByAgencier($id)
    {
        return DB::select('SELECT ps.id ,ps.image as image_post,ps.created_at ,ps.desc , us.email,us.image_profil,us.name,us.tel FROM `users` as us join post_models as ps on ps.user = us.id where us.id = :id',['id'=>$id]);
    }
    public function fiable($tr,$v)
    {
        if($v>0)
        return ($v/$tr)*100;
        if($v==0)
        return 0;
    }

    public function updateProfil(Request $request)
    {

    }
}
