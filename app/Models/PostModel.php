<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'desc', 'user', 'image'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user');
    }

    public function comments()
    {
        return $this->hasMany(CommentaireModel::class, 'post_model');
    }

    public function likes()
    {
        return $this->hasMany(LikeModel::class, 'post_model');
    }
}
