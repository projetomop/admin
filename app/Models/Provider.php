<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
use Laravel\Sanctum\HasApiTokens;

class Provider extends Model
{
    use HasFactory, Notifiable, HasApiTokens;
    use FormAccessible;

    protected $fillable = [
        'name',
        'cpf',
        'email',
        'telephone',
        'cep',
        'street',
        'district',
        'city',
        'state',
        'image',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
