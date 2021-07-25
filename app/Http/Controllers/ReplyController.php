<?php

namespace App\Http\Controllers;

use App\Mail\ReplySubmitted;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReplyController extends Controller
{
    public function store(Ticket $ticket, Request $request)
    {
        $request->validate([
            'reply_text' => ['required','max:50','min:3']
        ]);
        $reply = $ticket->replies()->create([
            'reply_text' => $request->reply_text,
            'user_id' => $request->user()->id
        ]);
        
        if (User::where('role', 'admin')->find($reply->user_id)) {
            Mail::to($ticket->user)->send(new ReplySubmitted($reply, $ticket->getURL()));
        }
        return redirect()->back();
    }
}
