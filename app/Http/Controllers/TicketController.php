<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResource;
use App\Mail\TicketSubmitted;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class TicketController extends Controller
{
    public function show(Ticket $ticket)
    {
        $this->authorize('view', $ticket);
        return Inertia::render('Tickets/Show', [
            'ticket' => new TicketResource($ticket->load('replies'))
        ]);
    }

    public function create()
    {
        return Inertia::render('Tickets/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','max:50','min:3'],
            'description' => ['required','max:800','min:3']
        ]);

        $ticket = Ticket::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user()->id,
            'severity' => $request->severity
        ]);
        $ticketURL = URL::to('/tickets/'.$ticket->id);
        Mail::to(User::where('role', 'admin')->first())->send(new TicketSubmitted($ticket, $ticketURL));
        return Redirect::route('tickets.show', $ticket);
    }

    public function closeTicket(Ticket $ticket)
    {
        $ticket->closed_at = Carbon::now();
        $ticket->save();

        return Redirect::route('client');
    }
}
