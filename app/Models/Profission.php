<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;


class Profission extends Model
{
    use FormAccessible;

    protected $fillable = [
        'description'
    ];
}
