<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Order;
use DB;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;
    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order =$order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    
       //  echo "<pre>";
       // print_r($this->order->all());

       //  echo "</pre>";
       //  die;
         
        

          return $this->to($this->order->billing_email,$this->order->user_name)
                    ->cc('ravikant.webcoir@gmail.com')
                    ->subject('New Order From wcfood ')
                    ->view('emails.order.placed');




    }
}
