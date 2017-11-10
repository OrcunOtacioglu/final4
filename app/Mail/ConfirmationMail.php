<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * ConfirmationMail constructor.
     * @param $order
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'info@deturf4.com';
        $subject = '2018 FINAL FOUR BELGRADE PACKAGE PURCHASE';
        $name = 'DETUR OFFICIAL TRAVEL AGENCY';

        return $this->view('mail.confirmation')
                    ->from($address, $name)
                    ->cc('info@acikgise.com', 'Açıkgişe Bilet Hizmetleri')
                    ->replyTo('info@acikgise.com', 'Açıkgişe Bilet Hizmetleri')
                    ->subject($subject)
                    ->with('order', $this->order);
    }
}
