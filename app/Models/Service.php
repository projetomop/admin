<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable =[
        // 'type',
        'description',
        'profission_id',
        'client_id',
        // 'receive'
    ];
    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
    ];

    public function profission(){
        return $this->belongsTo(Profission::class, 'profission_id');
    }
    public function client(){
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function proposals(){
        return $this->hasMany(Offer::class);
    }
}
