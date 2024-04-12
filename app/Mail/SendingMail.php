<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;


class SendingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $_from;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($from, $user)
    {   $this->user = $user;
        $this->_from = $from;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Confirmation Link';
        $intance =  $this->from($this->_from)->subject($subject);


        return $intance->view('mail-template.index', ['data' => $this->user]);

    }
}
