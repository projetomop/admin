<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Provider extends Model
{
    use HasFactory;
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
}
