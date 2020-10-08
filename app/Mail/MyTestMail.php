<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this
            ->from('buimanhthangtb@gmail.com')
            ->view('emails.myTestMail');
    }
}
