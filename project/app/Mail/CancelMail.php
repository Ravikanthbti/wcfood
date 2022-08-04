<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\CancelOrder;

class CancelMail extends Mailable
{
    use Queueable, SerializesModels;
     public $cancelorder;                                                     

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(CancelOrder $cancelorder)
    {
         $this->cancelorder = $cancelorder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->to($this->$cancelorder->email)
                    ->cc('ravikant.webcoir@gmail.com')
                    ->subject('Order cancel From wcfood ')
                    ->view('emails.cancel.cancelorder');


        
    }
}
