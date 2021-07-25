<?php

namespace App\Mail;

use App\Models\Reply;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplySubmitted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reply $reply, $ticketURL)
    {
        $this->reply = $reply;
        $this->ticketURL = $ticketURL;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@tms.gr', 'TMS')
                    ->markdown('emails.replysubmitted', [
                        'reply' => $this->reply,
                        'ticketURL' => $this->ticketURL
                    ]);
    }
}
