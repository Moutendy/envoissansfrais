<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentaireModel extends Model
{
    use HasFactory;
    protected $fillable=['comment','user','post_model'];

    public function user()
    {
        return $this->belongsTo(User::class,'user');
    }
}
