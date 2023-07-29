<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class descriptionModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'idUserAgency',
        'desc',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'idUserAgency');
    }

}
