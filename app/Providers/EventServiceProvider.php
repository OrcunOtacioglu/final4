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
        'App\Events\OrderCompleted' => [
            'App\Listeners\MakeSale',
            'App\Listeners\SellSeats',
            'App\Listeners\BookHotels',
            'App\Listeners\SendConfirmationMail',
            'App\Listeners\UpdateAnalytics'
        ],
        'App\Events\ZoneUpdated' => [
            'App\Listeners\DrawNewZone'
        ],
        'App\Events\BookingCreated' => [
            'App\Listeners\BlockBookingSeats'
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
