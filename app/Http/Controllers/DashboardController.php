<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Resources\TicketResource;
use Inertia\Inertia;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return  Inertia::render('Admin/Dashboard', [
            'tickets' => TicketResource::collection(Ticket::all()->sortByDesc('updated_at'))
        ]);
    }
}
