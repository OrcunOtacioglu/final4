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
            'phone' => '05315718209',
            'citizenship' => 'TR',
            'identifier' => '23140475804',
            'address' => 'Büyükdere Caddesi Özsezen İş Merkezi No:123 C Blok Kat:8',
            'zip_code' => '34394',
            'province' => 'İstanbul',
            'country' => 'TR',
            'password' => bcrypt('CPGKhrs7V'),
            'is_admin' => true,
        ]);

        DB::table('users')->insert([
            'name' => 'Dovakhin',
            'email' => 'orcun.otacioglu@detur.com',
            'phone' => '05315718209',
            'citizenship' => 'TR',
            'identifier' => '23140475804',
            'address' => 'Büyükdere Caddesi Özsezen İş Merkezi No:123 C Blok Kat:8',
            'zip_code' => '34394',
            'province' => 'İstanbul',
            'country' => 'TR',
            'password' => bcrypt('CPGKhrs7V'),
            'is_admin' => false,
        ]);
    }
}
