<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class confirmOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $items;
    public $total;
    public $name;
    public function __construct($items, $name, $total)
    {
        $this->items = $items;
        $this->name = $name;
        $this->total = $total;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                 ->subject("Your Order has been confirmed")
                 ->markdown('emails.confirmOrder');
    }
}
