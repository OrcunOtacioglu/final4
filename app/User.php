<?php

namespace App;

use App\Entities\Authorization\Role;
use App\Entities\Order;
use App\Entities\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'is_admin',
        'role_id',
        'phone',
        'citizenship',
        'identifier',
        'address',
        'zip_code',
        'province',
        'country',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return request()->user()->is_admin;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public static function getAdmins()
    {
        $users = User::where('is_admin', '=', true)->get();

        return $users;
    }

    public static function hasRole($roleReference)
    {
        $allowedRole = Role::where('reference', '=', $roleReference)->first();

        if (Auth::user()->role->id == $allowedRole->id || Auth::user()->role->level < $allowedRole->level) {
            return true;
        } else {
            return false;
        }
    }

    public static function createNew(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->surname = $request->surname;

        $user->is_admin = $request->is_admin;
        $user->role_id = $request->role_id;

        $user->phone = $request->phone != null ? $request->phone : '5555555555';
        $user->citizenship = $request->citizenship;
        $user->identifier = $request->identifier != null ? $request->identifier : '22222222222';

        $user->address = $request->address;
        $user->zip_code = $request->zip_code;
        $user->province = $request->province != null ? $request->province : 'Istanbul';
        $user->country = $request->country != null ? $request->country : 'Turkey';

        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->updated_at = Carbon::now();
        $user->created_at = Carbon::now();

        $user->save();

        return $user;
    }

    public static function updateEntity(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->surname = $request->surname;

        $user->is_admin = $request->is_admin;
        $user->role_id = $request->role_id;

        $user->phone = $request->phone != null ? $request->phone : '5555555555';
        $user->citizenship = $request->citizenship;
        $user->identifier = $request->identifier != null ? $request->identifier : '22222222222';

        $user->address = $request->address;
        $user->zip_code = $request->zip_code;
        $user->province = $request->province != null ? $request->province : 'Istanbul';
        $user->country = $request->country != null ? $request->country : 'Turkey';

        $user->email = $request->email;
        $user->password = $request->password == null ? $user->password : bcrypt($request->password);

        $user->updated_at = Carbon::now();

        $user->save();

        return $user;
    }
}
