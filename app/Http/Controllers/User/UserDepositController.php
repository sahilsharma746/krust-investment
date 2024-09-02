<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Getway;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserDepositController extends Controller
{
    public function index() {
        $datas = Deposit::with('getway')->where('user_id', auth()->user()->id)->latest()->get();
        $getways = Getway::where('deposit', 'yes')->get();
        return view('users.deposit.getway', compact('datas', 'getways'));
    }
    public function store(Request $request, $id) {
        $request->validate([
            'amount' => 'required | numeric | min:1',
            'receipt' => 'required | image | mimes:jpg,png,jpeg'
        ]);
        $path = 'uploads/';
        $file = $request->file('receipt');
        $fileName = time().'-receipt.'.auth()->user()->id.'.'.$file->getClientOriginalExtension();
        $request->receipt->move($path, $fileName);
        Deposit::insert([
            'user_id' => auth()->user()->id,
            'getway_id' => $id,
            'amount' => $request->amount,
            // 'wallet_address' => $request->amount,
            'receipt' => $path.$fileName,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Submited Successfully');
    }
}
