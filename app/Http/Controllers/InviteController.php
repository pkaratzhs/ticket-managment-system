<?php

namespace App\Http\Controllers;

use App\Mail\InvitationSent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

class InviteController extends Controller
{
    public function index()
    {
        return  Inertia::render('Admin/Invite');
    }
    public function sendInvite(Request $request)
    {
        $request->validate([
            'email'=> 'required|email'
        ]);
        $inviteurl = URL::temporarySignedRoute('register', now()->addDay(), ['email' => $request->email]);
        
        if (!User::where('email', '=', $request->email)->first()) {
            // need to catch possible errors
            try {
                Mail::to($request->email)->send(new InvitationSent($inviteurl));
            } catch (\Swift_TransportException $e) {
                return back()->with([
                    'flash' => [
                        'message' => $e->getMessage()
                    ]
                ]);
            }
            return back()->with([
                'flash' => [
                    'message'=>'Invite sent to '.$request->email
                ]
            ]);
        }
        return back()->with([
            'flash' => [
                'message'=>'Email already in use.'
            ]
        ]);
    }
}
