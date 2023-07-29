<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class validationModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'idUserSend',
        'idUserReceiver',
        'idUserAgency',
        'transaction_model'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'idUserSend','idUserAgency');
    }

    public function transaction()
    {
        return $this->belongsTo(transactionModel::class,'transaction_model');
    }

}
