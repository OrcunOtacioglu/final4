<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels';

    protected $fillable = [
        'uuid',
        'name',
        'media_path',
        'stars',
        'review_point',
        'review_count',
        'location',
        'description',
        'facilities'
    ];

    public function rooms()
    {
        return $this->hasMany(HotelRoom::class);
    }
}
