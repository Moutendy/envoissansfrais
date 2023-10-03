<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class validationModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_send',
        'user_receiver',
        'user_agencier',
        'desc',
        'transaction_model',
        'agencier_tel',
        'agencier_name',
        'user_send_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id');
    }

    public function transaction()
    {
        return $this->belongsTo(transactionModel::class,'user_send');
    }

}
