<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
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
            'subjectText' => $request->subject,
            'contentMessage' => $request->message,
        ], function ($mail) {
            $mail->to('contact@worldculture-travels.com')
                ->subject('Neue Kontaktanfrage');
        });


        return back()->with('success', 'Ihre Nachricht wurde erfolgreich gesendet.');
    }
}
