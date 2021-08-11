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
            'reply_text' => ['required','max:50','min:3'],
            'images.*' => ['mimes:jpg,jpeg,png','max:2048'],
            'images' => ['max:5']
        ]);
        $imageNames=array();
        if ($images = $request->file('images')) {
            foreach ($images as $image) {
                $path = $image->store('images');
                $imageNames[]= '/storage/'.$path;
            }
        }
        $reply = $ticket->replies()->create([
            'reply_text' => $request->reply_text,
            'user_id' => $request->user()->id,
            'images' => $request->file('images') ? implode('|', $imageNames) : null,
        ]);
        
        if (User::where('role', 'admin')->find($reply->user_id)) {
            try {
                Mail::to($ticket->user)->send(new ReplySubmitted($reply, $ticket->getURL()));
            } catch (\Swift_TransportException $e) {
                return redirect()->back();
            }
        }
        return redirect()->back();
    }
}
