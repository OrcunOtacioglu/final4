<?php

namespace App\Entities\Authorization;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name',
        'title',
        'description'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
