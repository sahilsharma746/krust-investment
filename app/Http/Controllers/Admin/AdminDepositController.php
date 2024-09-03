<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminDepositController extends Controller
{
   
    public function index() {
        $datas = DB::table('deposits')
            ->join('users', 'deposits.user_id', '=', 'users.id')
            ->select('deposits.*', 'users.first_name', 'users.last_name', 'users.email')
            ->orderBy('deposits.created_at', 'desc')
            ->orderBy('deposits.payment_method', 'asc')
            ->get();
        
        return view('admin.deposit.index', compact('datas'));
    }
    
    
    public function pending() {
        $datas = DB::table('deposits')
        ->join('users', 'deposits.user_id', '=', 'users.id')
        ->select('deposits.*', 'users.first_name', 'users.last_name', 'users.email')
        ->where('deposits.status', 'pending') 
        ->orderBy('deposits.created_at', 'desc')
        ->orderBy('deposits.payment_method', 'asc')
        ->get();
            
        return view('admin.deposit.index', compact('datas'));
    }
    public function approved() {

        $datas = DB::table('deposits')
        ->join('users', 'deposits.user_id', '=', 'users.id')
        ->select('deposits.*', 'users.first_name', 'users.last_name', 'users.email')
        ->where('deposits.status', 'approved') 
        ->orderBy('deposits.created_at', 'desc')
        ->orderBy('deposits.payment_method', 'asc')
        ->get();
        return view('admin.deposit.index', compact('datas'));
    }
    public function rejected() {


        $datas = DB::table('deposits')
        ->join('users', 'deposits.user_id', '=', 'users.id')
        ->select('deposits.*', 'users.first_name', 'users.last_name', 'users.email')
        ->where('deposits.status', 'rejected') 
        ->orderBy('deposits.created_at', 'desc')
        ->orderBy('deposits.payment_method', 'asc')
        ->get();        return view('admin.deposit.index', compact('datas'));
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
