<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'profile_name' => 'finansbank',
            'client_id' => '600697513',
            'storekey' => 'KUTU7513',
            'currency_code' => '978'
        ]);
    }
}
