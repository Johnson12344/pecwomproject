<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewProductMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $product;

    public function __construct(array $product)
    {
        $this->product = $product;
    }

    public function build()
    {
        return $this->subject('New product: '.$this->product['title'])
            ->view('emails.new_product');
    }
}


