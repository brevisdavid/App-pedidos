<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Cart;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $cart;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user,Cart $cart)
    {
       $this->user=$user;
       $this->cart=$cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new-order')->subject('Un cliente a realizado un nuevo pedido!!');
    }
}
