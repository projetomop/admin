<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable =[
        'type',
        'description',
        'profission',
    ];

    public function profission(){
        return $this->belongsTo(Profission::class, 'profission');
    }
}
