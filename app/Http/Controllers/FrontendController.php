<?php

namespace App\Http\Controllers;

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

    public function accountPlan() {
        return view('accountPlan');
    }

    public function faq() {
        return view('faq');
    }
}
