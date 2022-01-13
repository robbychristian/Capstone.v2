<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendAttachment extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $file;
    public $user;
    public $subject;
    public $maildata;

    public function __construct($file, $user, $subject, $maildata)
    {
        $this->file = $file;
        $this->user = $user;
        $this->subject = $subject;
        $this->maildata = $maildata;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('features.mail')
            ->subject($this->subject)
            ->attach(storage_path('app/public/attachments/' . $this->user . '/' . $this->file));
    }
}
