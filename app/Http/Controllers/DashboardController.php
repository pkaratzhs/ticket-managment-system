<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Resources\TicketResource;
use Inertia\Inertia;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $openTickets = Ticket::whereNull('closed_at')->orderBy('updated_at', 'desc')->paginate(5);
        $closedTickets = Ticket::whereNotNull('closed_at')->orderBy('updated_at', 'desc')->paginate(5);
        return  Inertia::render('Admin/Dashboard', [
            'ticketStatus' => $request->ticketStatus,
            'tickets' => function () use ($request, $openTickets, $closedTickets) {
                if ($request->ticketStatus === 'closed') {
                    return TicketResource::collection($closedTickets)->withQueryString();
                }
                return TicketResource::collection($openTickets)->withQueryString();
            },

        ]);
    }
}
