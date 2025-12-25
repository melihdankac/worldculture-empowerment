<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Mail::send('emails.contact', [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'contentMessage' => $request->message,
        ], function ($mail) {
            $mail->to('contact@worldculture-travels.com')
                ->subject('Neue Kontaktanfrage');
        });

        // Mail::to()->send(new ContactUs($request->all()));

        return back()->with('success', 'Ihre Nachricht wurde erfolgreich gesendet.');
    }
}
