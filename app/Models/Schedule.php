<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'client_id',
        'provider_id',
        'date',
        'hour'

    ];
    protected $casts = [
        'date' => 'datetime:d/m/Y',
        'hour' => 'datetime:H:m'
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
