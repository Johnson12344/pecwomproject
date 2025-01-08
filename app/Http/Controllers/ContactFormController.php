<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    function post_message(Request $request){

        $request->validate([
            'email' => 'required|email'
        ]);
        return $request->all();
    }
}
