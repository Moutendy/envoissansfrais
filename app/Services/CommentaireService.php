<?php

namespace App\Services;
use App\Models\{CommentaireModel,PostModel};
use Illuminate\Http\Request;
/**
 * Class CommentaireService
 * @package App\Services
 */
class CommentaireService
{

    public function index($id)
    {
        $post=PostModel::find($id);
        if(!$post)
        {
            return response(['message'=>'Post not found.'],404);
        }
        return response(['comments'=>$post->comments()->with('user:id,name,image')->orderBy('created_at','desc')->get()],201);
    }


    public function store(Request $request,$id)
    {
        $post=PostModel::find($id);
        if(!$post)
        {
            return response(['message'=>'Post not found.'],404);
        }

        $attrs= $request->validate([
            'comment'=>'required|string'
        ]);
    CommentaireModel::create([
    'comment'=>$attrs['comment'],
    'post_model'=>$id,
    'user'=>auth()->user()->id]);

        return response(['message'=>'Comment created.'],201);
    }


    public function update(Request $request,$id)
    {
        $comment = CommentaireModel::find($id);
        if(!$comment)
        {
            return response(['message'=>'Post not found.'],404);
        }
        if($comment->user != auth()->user()->id)
        {
            return response(['message'=>'Permission denied.'],403);
        }
        $attrs= $request->validate([
            'comment'=>'required|string'
        ]);
        $comment->update(['comment'=>$attrs['comment'],
   ]);

        return response(['message'=>'comment updated.']
         ,201);
    }

    public function delete($id)
    {
        $comment=CommentaireModel::find($id);
        if(!$comment)
        {
            return response(['message'=>'Post not found.'],404);
        }
        if($comment->user != auth()->user()->id)
        {
            return response(['message'=>'Permission denied.'],403);
        }
        $comment->delete();
        return response(['message'=>'Commentaire delete',200]);
    }
}
