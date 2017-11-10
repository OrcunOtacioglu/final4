<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class CheckOrderStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $order;

    /**
     * CheckOrderStatus constructor.
     * @param $order
     */
    public function __construct($order)
    {
        $this->order = $order;

        Log::notice('Worker created!', [
            'reference' => $order->reference
        ]);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->order->status != 4) {
            SetSeatsFree::dispatch($this->order->items);
        }
    }
}
