<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Models\UserAccountType;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class UserHomeController extends Controller
{
    public function index() {
        $full_data = [];
        $user = Auth::user();
        $user_data = User::with('addresses')->where([['role', 'user'], ['id', $user->id]])->first();
        // dd($user_data);
        // dd($user_data->first_name);

        $full_data['total_deposit'] = Deposit::getUserDepositAmount($user->id);
        $full_data['total_approved_deposit'] = Deposit::getUserDepositAmount($user->id, 'approved');
        $full_data['countries'] = config('countries');
        $full_data['user_data'] = $user_data;
        // dd($full_data['countries']);

        


        return view('users.index', compact('full_data'));
    }

    public function news() {
        return view('users.news');
    }
}
