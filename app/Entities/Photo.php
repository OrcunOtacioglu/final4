<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'hotel_photos';

    protected $fillable = [
        'hotel_id',
        'name',
        'path',
        'thumbnail_path'
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
