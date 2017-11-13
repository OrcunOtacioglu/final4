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
        'reference',
        'level'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }

    public static function createNew(Request $request)
    {
        $rate = new Role();

        $rate->name = $request->name;
        $rate->reference = strtolower(str_replace(' ', '-', $request->name));

        $rate->level = $request->level;

        $rate->updated_at = Carbon::now();
        $rate->created_at = Carbon::now();

        $rate->save();

        return $rate;
    }

    public static function updateEntity(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $role->name = $request->name;
        $role->reference = strtolower(str_replace(' ', '-', $request->name));

        $role->level = $request->level;

        $role->save();

        return $role;
    }
}
