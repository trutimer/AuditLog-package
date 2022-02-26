<?php

namespace Eddytim\Auditlog\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AlertOtherUsersMail extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('audit::email.alert');
    }
}
