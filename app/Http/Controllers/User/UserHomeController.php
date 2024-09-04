<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\UserAccountType;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class UserHomeController extends Controller
{
    public function index() {
        $full_data = [];
        $user = Auth::user();
        $full_data['total_deposit'] = Deposit::getUserDepositAmount($user->id);
        $full_data['total_approved_deposit'] = Deposit::getUserDepositAmount($user->id, 'approved');

        return view('users.index', compact('full_data'));
    }

    public function news() {
        return view('users.news');
    }
}
