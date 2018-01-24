<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Dovakhin',
            'email' => 'orcun.otacioglu@acikgise.com',
            'password' => bcrypt('CPGKhrs7V'),
        ]);
    }
}
