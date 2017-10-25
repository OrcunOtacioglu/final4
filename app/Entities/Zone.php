<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $table = 'zones';

    protected $fillable = [
        'name',
        'objects',
        'previous_objects'
    ];

    public function rate()
    {
        return $this->belongsToMany(Rate::class);
    }

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}
