<?php

namespace App\Services;
use App\Models\{LikeModel,PostModel};
/**
 * Class LikeService
 * @package App\Services
 */
class LikeService
{
    public function likeanddislike($id)
    {
        $post=PostModel::find($id);
        if(!$post)
        {
            return response(['message'=>'Post not found.'],404);
        }
       $like= $post->likes()->where('user',auth()->user()->id)->first();
       if(!$like)
       {
        LikeModel::create(['post_model'=>$id,
        'user'=>auth()->user()->id]);
        return response(['message'=>'Liked.'],201);
       }

       $like->delete();
       return response(['message'=>'disliked.'],201);
    }
}
