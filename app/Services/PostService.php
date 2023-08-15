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
        $post = PostModel::orderBy('created_at', 'desc')->with('user:id,name,image_profil')->withCount('comments', 'likes')->paginate(6);
        return response(['post' => $post], 201);
    }

    public function store(Request $request)
    {
        $attrs = $request->validate([
            'desc' => 'required|string',
        ]);


        if (!empty($request->file('image'))) {
            $path = 'public/posts';
            $fileimage = $request->file('image');
            $nameimage = $fileimage->getClientOriginalName();
            $request->file('image')->move('storage\public\posts', $nameimage);

            $post = PostModel::create([
                'desc' => $attrs['desc'],
                'user' => 2,
                'image' => URL::to('/') . '/storage/' . $path . '/' . $nameimage,
            ]);
        } else {
            $post = PostModel::create([
                'desc' => $attrs['desc'],
                'user' => 2,
                'image' => '',
            ]);
        }

        return response(['message' => 'Post ajouté.', 'post' => $post], 201);
    }


    public function update(Request $request, $id)
    {
        $post = PostModel::find($id);
        if (!$post) {
            return response(['message' => 'Post not found.'], 403);
        }
        if ($post->user != 2) {
            return response(['message' => 'Permission denied.'], 403);
        }


        if($post->update($request->all()))
        {
            return Response('success Post update.',200);
        }
        return response(['message' => 'Post no update.', 'post' => $post], 201);
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
}
