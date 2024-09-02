<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index () {
        
        // $totalUsers = User::where('role', 'user')->count();
        // $totalActiveUsers = User::where([['role', 'user'], ['status', 'active']])->count();
        // $totalVerifiedUsers = User::where([['role', 'user'], ['verify_status', 'Verified']])->count();
        // $totalUnverifiedUsers = User::where([['role', 'user'], ['verify_status', 'Unverified']])->count();
        // $totalDeposit = Deposit::sum('amount');
        // $pendingDeposit = Deposit::where('status', 'pending')->sum('amount');
        // $rejectedDeposit = Deposit::where('status', 'rejected')->sum('amount');
        // $totalWithdraw = Withdraw::sum('amount');
        // $pendingWithdraw = Withdraw::where('status', 'pending')->sum('amount');
        // $rejectedWithdraw = Withdraw::where('status', 'rejected')->sum('amount');

        $totalUsers =  $totalActiveUsers = $totalVerifiedUsers = $totalUnverifiedUsers =  $totalDeposit = $pendingDeposit = $rejectedDeposit = $totalWithdraw = $pendingWithdraw = $rejectedWithdraw = '0';

        return view('admin.index', compact('totalUsers', 'totalActiveUsers', 'totalVerifiedUsers', 'totalUnverifiedUsers', 'totalDeposit', 'pendingDeposit', 'rejectedDeposit', 'totalWithdraw', 'pendingWithdraw', 'rejectedWithdraw'));
    }


    public function adminLogin(){
        return view('admin.adminlogin');
    }

}
