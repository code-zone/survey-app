<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Notifications\Messages\SimpleMessage;

class FeedbackSent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Collection or Request Object with view data.
     *
     * @var mixed
     **/
    protected $data;

    /**
     * Create a new message instance.
     *
     * @param mixed $data A collection or Request Object
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $bulider = (new SimpleMessage())
                    ->greeting('Hallo! '.$this->data->get('name'))
                    ->line('Thank you for getting in touch with us, someone will get back to you shortly .')
                    ->line('Just sit back and relax and wait for a reply from us');

        return $this->markdown('notifications::email', $bulider->toArray());
    }
}
