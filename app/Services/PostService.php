<?php

namespace App\Services;
use App\Models\PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Services\ImageService;

/**
 * Class PostService
 * @package App\Services
 */
class PostService
{


    protected ImageService $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index()
    {
        $post = PostModel::orderBy('created_at', 'desc')->with('user:id,name,image_profil')->withCount('comments', 'likes')->get();
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
            'user' => 2,
            'image' => URL::to('/').'/storage/'.$path.'/'.$nameimage,
        ]);
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
        else  if(!Empty($request->desc)){
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
        if ($post->user != 2) {
            return response(['message' => 'Permission denied.'], 403);
        }
        if ($post->user == 2) {
            $post->delete();
            return response(['message' => 'post supprimé'], 201);
        }
        return response(['message' => 2], 201);
    }


    public function show($id)
    {
        $post = PostModel::find($id);
        if (!$post) {
            return response(['message' => 'Aucun post avec cette id.'], 404);
        }
        if ($post->user != 2) {
            return response(['message' => 'Permission denied.'], 403);
        }
        if ($post->user == 2) {

            return response($post, 201);
        }
        return response(['message' => 2], 201);
    }
}
