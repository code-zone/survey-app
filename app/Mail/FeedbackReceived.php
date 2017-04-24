<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Notifications\Messages\SimpleMessage;

class FeedbackReceived extends Mailable
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
                    ->greeting('Hallo!')
                    ->line($this->data->get('message'))
                    ->salutation('From '.$this->data->get('name'));

        return $this->markdown('notifications::email', $bulider->toArray());
    }
}
