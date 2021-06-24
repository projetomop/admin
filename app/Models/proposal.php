<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'provider_id',
        'description',
        'days',
        'value',
        'status'
    ];

    public function service(){
        return $this->hasMany(Service::class, 'service_id');
    }
}
