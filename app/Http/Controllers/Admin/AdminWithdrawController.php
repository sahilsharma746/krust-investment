<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class AdminWithdrawController extends Controller
{
    public function index() {
        $datas = Withdraw::with('getway', 'user')->latest()->get();
        return view('admin.withdraw.index', compact('datas'));
    }
    public function pending() {
        $datas = Withdraw::with('getway', 'user')->where('status', 'pending')->latest()->get();
        return view('admin.withdraw.index', compact('datas'));
    }
    public function approved() {
        $datas = Withdraw::with('getway', 'user')->where('status', 'approved')->latest()->get();
        return view('admin.withdraw.index', compact('datas'));
    }
    public function rejected() {
        $datas = Withdraw::with('getway', 'user')->where('status', 'rejected')->latest()->get();
        return view('admin.withdraw.index', compact('datas'));
    }
    public function approvedStatus($id) {
        $data = Withdraw::where([['id', $id], ['status', 'pending']])->first();
        if ($data) {
            $data->update([
                'status' => 'approved'
            ]);
        }
        return back()->with('success', 'Updated Successfully');
    }
    public function rejectedStatus($id) {
        $data = Withdraw::where([['id', $id], ['status', 'pending']])->first();
        if ($data) {
            $data->update([
                'status' => 'rejected'
            ]);
        }

        $user = User::where('id', $data->user_id)->first();
        $user->increment('balance', $data->amount);
        return back()->with('success', 'Updated Successfully');
    }
    public function delete($id) {
        $data = Withdraw::where('id', $id)->first();
        if ($data->status == 'pending') {
            $user = User::where('id', $data->user_id)->first();
            $user->increment('balance', $data->amount);
        }
        $data->delete();
        return back()->with('success', 'Updated Successfully');
    }
}
