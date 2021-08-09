<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Http\Resources\TicketResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $tickets = Auth::user()->tickets()->filter($request->only('search', 'ticketStatus', 'severity'))->orderBy('updated_at', 'desc')->paginate(5);
        return  Inertia::render('Client/Home', [
            'filters' => $request->only('ticketStatus', 'search', 'severity'),
            'tickets' => TicketResource::collection($tickets)->withQueryString()
        ]);
    }
}
