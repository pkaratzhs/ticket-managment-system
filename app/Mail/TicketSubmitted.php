<?php

namespace App\Mail;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $ticketURL;
    protected $ticket;
    public function __construct(Ticket $ticket, $ticketURL)
    {
        $this->ticket = $ticket;
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
                    ->markdown('emails.ticketsubmitted', [
                        'ticket' => $this->ticket,
                        'ticketURL' => $this->ticketURL
                    ]);
    }
}
