<?php

namespace App\Http\Controllers;

use App\Models\Contact_us_message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index() {
        return view('index');
    }

    public function about() {
        return view('about');
    }

    public function contact() {
        return view('contact');
    }

    public function accountPlan() {
        return view('accountPlan');
    }

    public function faq() {
        return view('faq');
    }

    public function message(Request $request)
    {
        $request->validate([
            'email' => 'required|email', 
            'message' => 'required|string|max:255', 
        ]);

        Contact_us_message::create([
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        return redirect()->route('frontend.contact')->with('success', 'Your message has been sent successfully!');    }
}
