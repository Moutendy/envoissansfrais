<?php

namespace App\Services;
use App\Models\{LikeModel,PostModel};
/**
 * Class LikeService
 * @package App\Services
 */
class LikeService
{
    //auth()->user()->id
    public function likeanddislike($id)
    {
        $post=PostModel::find($id);
        if(!$post)
        {
            return response(['message'=>'Post not found.'],404);
        }
       $like= $post->likes()->where('user',2)->first();
       if(!$like)
       {
        LikeModel::create(['post_model'=>$id,
        'user'=>2]);
        return response(['message'=>'Liked.'],201);
       }

       $like->delete();
       return response(['message'=>'disliked.'],201);
    }
}
