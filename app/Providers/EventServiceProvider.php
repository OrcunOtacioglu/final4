<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\OrderCreated' => [
            'App\Listeners\BlockSeats'
        ],
        'App\Events\SeatsFree' => [
            'App\Listeners\SetSeatsFree'
        ],
        'App\Events\OrderCompleted' => [
            'App\Listeners\MakeSale',
            'App\Listeners\SellSeats',
            'App\Listeners\BookHotels',
            'App\Listeners\SendConfirmationMail'
        ],
        'App\Events\ZoneUpdated' => [
            'App\Listeners\DrawNewZone'
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
