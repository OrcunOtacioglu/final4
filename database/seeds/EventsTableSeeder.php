<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'name' => 'Turkish Airlines EuroLeague Final Four 2018 Belgrade',
            'slug' => 'euroleague-final-four-2018-belgrade',
            'description' => 'The 2018 Turkish Airlines EuroLeague Final Four marks the first time in the three-decade history of the event that it will touch down in the Serbian capital. Kombank Arena, which officially opened in 2004, has a capacity of about 18,000 seats for the event, which will make it the biggest Final Four this century in terms of attendance. Fully 80% of the capacity will be available to the public. From that total, each of the four qualified teams will be allotted with approximately 800 tickets in different categories. The other 20% of the seating is reserved for media, sponsors and authorities.',
            'cover_photo' => 'final-4.jpg',
            'start_date' => \Carbon\Carbon::now(),
            'end_date' => \Carbon\Carbon::now(),
            'on_sale_date' => \Carbon\Carbon::now(),
            'category' => 'sport',
            'status' => 1,
            'listing' => 1,
            'is_seated' => true,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
