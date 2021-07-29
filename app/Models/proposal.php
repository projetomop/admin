<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Proposal extends Model
{
    use FormAccessible;

    protected $fillable = [
        'service_id',
        'provider_id',
        'description',
        'days',
        'value',
        'status'
    ];

    public function service(){
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function provider(){
        return $this->belongsTo(Provider::class, 'provider_id');
    }
}
