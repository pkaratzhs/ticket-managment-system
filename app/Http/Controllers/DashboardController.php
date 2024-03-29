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
        $tickets = Ticket::filter($request->only('search', 'ticketStatus', 'severity'))->orderBy('updated_at', 'desc')->paginate(5);
        return  Inertia::render('Admin/Dashboard', [
            'filters' => $request->only('ticketStatus', 'search', 'severity'),
            'tickets' => TicketResource::collection($tickets)->withQueryString()
        ]);
    }
}
