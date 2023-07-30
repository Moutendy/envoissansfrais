<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactionModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'idUserSend',
        'idUserReceiver',
        'idUserAgency',
        'desc',
        'date',
        'start',
        'end',
        'type',
        'id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'idUserSend','idUserAgency','idUserReceiver');
    }

    public function messages()
    {
        return $this->hasMany(MessageModel::class, 'id');
    }
}
