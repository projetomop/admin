<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Provider extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    // use FormAccessible;

    protected $fillable = [
        'name',
        'cpf',
        'email',
        'telephone',
        'birthDate',
        'cep',
        'street',
        'district',
        'city',
        'state',
        'image',
        'password',
        'profission_id',
        'curriculum',
        'confirmed'
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

    public function proposals()
    {
        return $this->hasMany(Offer::class);
    }
    public function profission()
    {
        return $this->belongsTo(Profission::class, 'profission_id');
    }

}
