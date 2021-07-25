<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Http\Resources\TicketResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return  Inertia::render('Client/Home', [
            'tickets' => TicketResource::collection(Auth::user()->tickets->sortByDesc('updated_at'))
        ]);
    }
}
