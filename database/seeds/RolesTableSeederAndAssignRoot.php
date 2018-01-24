<?php

use App\Entities\Authorization\Permission;
use App\Entities\Authorization\Role;
use App\User;
use Illuminate\Database\Seeder;

class RolesTableSeederAndAssignRoot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'root',
            'title' => 'Root',
            'description' => 'All level rights included. There is no restriction on this role.'
        ]);

        DB::table('permissions')->insert([
            'name' => 'view-dashboard',
            'description' => 'Can view Dashboard'
        ]);

        $role = Role::where('name', '=', 'root')->first();
        $permission = Permission::where('name', '=', 'view-dashboard')->first();
        $user = User::where('email', '=', 'orcun.otacioglu@acikgise.com')->first();

        DB::table('permission_role')->insert([
            'permission_id' => $permission->id,
            'role_id' => $role->id
        ]);

        DB::table('role_user')->insert([
            'role_id' => $role->id,
            'user_id' => $user->id
        ]);
    }
}
