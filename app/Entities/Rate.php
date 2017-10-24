<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = 'rates';

    protected $fillable = [
        'name',
        'color_code',
        'price',
        'available',
        'available_online',
        'available_box_office',
        'online_fee',
        'box_office_fee',
        'online_comission',
        'box_office_comission',
    ];
}
