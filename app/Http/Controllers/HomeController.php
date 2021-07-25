<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $openTickets = Ticket::where('user_id', '=', Auth::user()->id)->whereNull('closed_at')->orderBy('updated_at', 'desc')->paginate(5);
        $closedTickets = Ticket::where('user_id', '=', Auth::user()->id)->whereNotNull('closed_at')->orderBy('updated_at', 'desc')->paginate(5);
        return  Inertia::render('Client/Home', [
            'openTickets' => TicketResource::collection($openTickets),
            'closedTickets' => TicketResource::collection($closedTickets)
        ]);
    }
}
