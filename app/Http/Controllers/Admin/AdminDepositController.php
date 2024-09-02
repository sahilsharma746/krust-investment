<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDepositController extends Controller
{
    public function index() {
        $datas = Deposit::with('getway', 'user')->latest()->get();
        return view('admin.deposit.index', compact('datas'));
    }
    public function pending() {
        $datas = Deposit::with('getway', 'user')->where('status', 'pending')->latest()->get();
        return view('admin.deposit.index', compact('datas'));
    }
    public function approved() {
        $datas = Deposit::with('getway', 'user')->where('status', 'approved')->latest()->get();
        return view('admin.deposit.index', compact('datas'));
    }
    public function rejected() {
        $datas = Deposit::with('getway', 'user')->where('status', 'rejected')->latest()->get();
        return view('admin.deposit.index', compact('datas'));
    }
    public function approvedStatus($id) {
        $data = Deposit::where([['id', $id], ['status', 'pending']])->first();
        if ($data) {
            $data->update([
                'status' => 'approved'
            ]);
        }
        $user = User::where('id', $data->user_id)->first();
        $user->increment('balance', $data->amount);
        return back()->with('success', 'Updated Successfully');
    }
    public function rejectedStatus($id) {
        $data = Deposit::where([['id', $id], ['status', 'pending']])->first();
        if ($data) {
            $data->update([
                'status' => 'rejected'
            ]);
        }
        return back()->with('success', 'Updated Successfully');
    }
    public function delete($id) {
        $data = Deposit::where('id', $id)->first();
        if ($data) {
            unlink(base_path($data->receipt));
            $data->delete();
        }
        return back()->with('success', 'Updated Successfully');
    }
}
