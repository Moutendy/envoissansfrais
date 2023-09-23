<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactionModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_send',
        'user_receiver',
        'user_agencier',
        'desc',
        'start',
        'end',
        'accept_transaction'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_send','user_receiver','user_agencier');
    }

    public function messages()
    {
        return $this->hasMany(MessageModel::class, 'id');
    }
}
