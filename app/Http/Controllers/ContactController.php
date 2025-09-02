<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    private const ADMIN_EMAIL = 'ogunbanwofemi2000@gmail.com';

    public function show()
    {
        return view('home.contact', [
            'count' => Auth::id() ? Cart::where('user_id', Auth::id())->count() : ''
        ]);
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10'
        ]);

        try {
            Mail::to(self::ADMIN_EMAIL)->send(new ContactMail($validated));
            session()->flash('toast', [
                'type' => 'success',
                'message' => 'Your message has been sent successfully!'
            ]);
            return back();
        } catch (\Exception $e) {
            session()->flash('toast', [
                'type' => 'error',
                'message' => 'Failed to send message. Please try again later.'
            ]);
            return back()->withInput();
        }
    }
}




