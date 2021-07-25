<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Ticket $ticket, Request $request)
    {
        $request->validate([
            'reply_text' => ['required','max:50','min:3']
        ]);
        $ticket->replies()->create([
            'reply_text' => $request->reply_text,
            'user_id' => $request->user()->id
        ]);

        return redirect()->back();
    }
}
