<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ModalFormRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $contactMethods;
    public $utm;

    /**
     * Create a new message instance.
     */
    public function __construct(array $data, string $contactMethods, array $utm)
    {
        $this->data = $data;
        $this->contactMethods = $contactMethods;
        $this->utm = $utm;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Заявка з форми: ' . $this->data['type'])
            ->text('emails.modal_form_plain');
    }
}
