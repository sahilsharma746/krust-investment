<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserHomeController extends Controller
{
    public function index() {

        


        $totalDeposit = Deposit::where('status', 'approved')->sum('amount');
        return view('users.index', compact('totalDeposit'));
    }

    public function news() {
        return view('users.news');
    }
}
