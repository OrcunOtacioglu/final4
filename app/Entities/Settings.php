<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $casts = [
        'settings' => 'array'
    ];
}
