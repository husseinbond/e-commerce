<?php

namespace App\Mail;
use App\order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class orderplace extends Mailable
{

   

    use Queueable, SerializesModels;
    
    
    public $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
 

    /**
     * Build the message.
     *
     * @return $this
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
        
        return $this->from('sender@example.com')
        ->to($this->order->billing_email, $this->order->billing_name)
        ->bcc('another@another.com')
        ->subject('Order for Laravel Ecommerce Example')
        ->markdown('mail.order.mail');
    }
}
