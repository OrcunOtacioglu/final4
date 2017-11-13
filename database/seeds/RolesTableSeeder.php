<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Root',
            'reference' => 'root',
            'level' => 0
        ]);

        DB::table('roles')->insert([
            'name' => 'Admin',
            'reference' => 'admin',
            'level' => 1
        ]);

        DB::table('roles')->insert([
            'name' => 'Finance',
            'reference' => 'finance',
            'level' => 2
        ]);

        DB::table('roles')->insert([
            'name' => 'Marketer',
            'reference' => 'marketer',
            'level' => 3
        ]);
    }
}
