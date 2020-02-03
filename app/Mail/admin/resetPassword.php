<?php

namespace App\Mail\admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class resetPassword extends Mailable
{
    use Queueable, SerializesModels;

   
   protected $data =[];

    public function __construct($value=null)
    {
        return $this->data = $value;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.admin.resetMessage')
                                                          ->subject("Reset Admin Acount")
                                                          ->with(['data' => $this->data]);
    }
}
