<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'zones';

    /**
     * Mass assignable fields.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'objects',
        'previous_objects'
    ];

    /**
     * Returns related Seat entities.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seats()
    {
        return $this->hasMany(Seat::class);
    }

    public function seatmap()
    {
        return $this->belongsTo(SeatMap::class);
    }
}
