<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageModel extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'issue', 'recipient', 'sms_text','sms_image','transaction_model'];
    public function transaction()
    {
        return $this->belongsTo(transactionModel::class,'id');
    }
}
