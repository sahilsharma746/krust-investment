<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index () {
        $datas = User::where('role', 'user')->latest()->get();;
        return view('admin.users.index', compact('datas'));
    }


    public function activeUsers () {
        $datas = User::where([['role', 'user'], ['status', 'active']])->latest()->get();;
        return view('admin.users.index', compact('datas'));
    }


    public function kycVerified () {
        $datas = User::where([['role', 'user'], ['verify_status', 'Verified']])->latest()->get();;
        return view('admin.users.index', compact('datas'));
    }


    public function kycUnverified () {
        $datas = User::where([['role', 'user'], ['verify_status', 'Unverified']])->latest()->get();;
        return view('admin.users.index', compact('datas'));
    }


    public function emailVerified () {
        $datas = User::where([['role', 'user'], ['email_verified_at', '!=', '']])->latest()->get();;
        return view('admin.users.index', compact('datas'));
    }


    public function phoneVerified () {
        $datas = User::where([['role', 'user'], ['phone', '!=', '']])->latest()->get();;
        return view('admin.users.index', compact('datas'));
    }


    public function bannedVerified () {
        $datas = User::where([['role', 'user'], ['status', 'deactive']])->latest()->get();;
        return view('admin.users.index', compact('datas'));
    }



    public function banUser (User $user) {
        $user->update([
            'status' => 'deactive'
        ]);

        return back()->with('success', 'Banned Succesfully');
    }

    public function editBalance(User $user) {
        return view('admin.users.edit-balance', compact('user'));
    }

    public function updateBalance(Request $request, User $user) {
        $request->validate([
            'amount' => 'required | numeric | min:1',
            'type' => 'required | string'
        ]);

        if ($request->type == 'credit') {
            $user->increment('balance', $request->amount);
            return to_route('admin.user.index')->with('success', 'Updated Successfully');
        }elseif ($request->type == 'debit'){
            if ($user->balance > $request->amount) {
                $user->decrement('balance', $request->amount);
                return to_route('admin.user.index')->with('success', 'Updated Successfully');
            }else{
                return to_route('admin.user.index')->with('error', 'This user dose not have enough balance');
            }
        }else{
            abort(404);
        }
    }







    public function deleteUser(User $user) {
        $arr = explode('/', $user->avatar);
        $img = end($arr);
        if ($img != 'avatar.png') {
            unlink(base_path($user->avatar));
        }

        $user->delete();
        return back()->with('success', 'Deleted Successfully');
    }


    public function form () {
        return view('admin.form');
    }
}
