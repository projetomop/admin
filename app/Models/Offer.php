<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'service_id',
        'provider_id',
        'description',
        'days',
        'value',
        'status',
        'startDate',
        'startTime'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }
}
