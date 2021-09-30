<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'offer_id',
        'client_id',
        'provider_id',
        'message',
        'type_sender'
    ];
}
