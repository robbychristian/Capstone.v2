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
    public function __construct($file, $user)
    {
        $this->file = $file;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('features.mail')
            ->subject('This is notification')
            ->attach(storage_path('app/public/attachments/' . $this->user . '/' . $this->file));
    }
}
