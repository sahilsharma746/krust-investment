<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class AdminWithdrawController extends Controller
{
    public function getAllWithDrawls() {
        $withdrawls = Withdraw::join('users', 'withdraws.user_id', '=', 'users.id')
                        ->select('withdraws.*', 'users.first_name', 'users.last_name', 'users.email')
                        ->orderBy('withdraws.created_at', 'asc')
                        ->get();
        return view('admin.withdraw.index', compact('withdrawls'));
    }
    
    public function getPendingWithDrawls() {
        $withdrawls = Withdraw::join('users', 'withdraws.user_id', '=', 'users.id')
                        ->select('withdraws.*', 'users.first_name', 'users.last_name', 'users.email')
                        ->where('withdraws.status', 'pending')
                        ->orderBy('withdraws.created_at', 'asc')
                        ->get();
        return view('admin.withdraw.index', compact('withdrawls'));
    }
    
    public function getApprovedWithDrawls() {
        $withdrawls = Withdraw::join('users', 'withdraws.user_id', '=', 'users.id')
                            ->select('withdraws.*', 'users.first_name', 'users.last_name', 'users.email')
                            ->where('withdraws.status', 'approved')
                            ->orderBy('withdraws.created_at', 'asc')
                            ->get();
        return view('admin.withdraw.index', compact('withdrawls'));
    }
    
    public function getRejectedWithDrawls() {
        $withdrawls = Withdraw::join('users', 'withdraws.user_id', '=', 'users.id')
                        ->select('withdraws.*', 'users.first_name', 'users.last_name', 'users.email')
                        ->where('withdraws.status', 'rejected')
                        ->orWhere('withdraws.status', 'deleted')
                        ->orderBy('withdraws.created_at', 'asc')
                        ->get();
        return view('admin.withdraw.index', compact('withdrawls'));
    }
    
    public function approvedWithDrawlStatus($id) {
        $data = Withdraw::where('id', $id)->first();
        $user = User::where('id', $data->user_id)->first();
        if( $user->balance < $data->amount ){
            return back()->with('error', 'User does not have sufficient balance.');
        }
        if ($data) {
            $data->update([ 'status' => 'approved' ]);
        }
        $user->decrement('balance', $data->amount);
        return back()->with('success', 'Updated Successfully');
    }


    public function rejectedWithDrawlStatus($id) {
        $data = Withdraw::where('id', $id)->first();
        $user = User::where('id', $data->user_id)->first();
        if( $data->status == 'approved' ){
            $user->increment('balance', $data->amount);
        }
        if ($data) {
            $data->update([  'status' => 'rejected' ]);
        }
        return back()->with('success', 'Updated Successfully');
    }
    
    public function deleteWithDrawl($id) {
        $data = Withdraw::where('id', $id)->first();
        $user = User::where('id', $data->user_id)->first();
        if( $data->status == 'approved' ){
            $user->increment('balance', $data->amount);
        }
        if ($data) {
            $data->update([  'status' => 'deleted' ]);
        }
        return back()->with('success', 'Updated Successfully');
    }
}
