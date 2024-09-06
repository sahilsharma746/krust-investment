<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Getway;
use App\Models\User;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserWithdrawController extends Controller
{
    public function index() {
        $getways = Getway::where('withdraw', 'yes')->get();
        $datas = Withdraw::with('getway')->where('user_id', auth()->user()->id)->latest()->get();
        return view('users.withdraw.index', compact('getways', 'datas'));
    }


    public function store(Request $request) {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'getway' => 'required|numeric',
            'address' => 'required',
            'address_tag' => 'nullable'
        ]);
    
        $user = User::where('id', auth()->user()->id)->first();
    
     
        if ($user->balance < $request->amount) {
            return back()->with('error', 'You don’t have enough balance.');
        }
    
        $getway = Getway::find($request->getway);
    
      
        if (!$getway) {
            return back()->with('error', 'Invalid withdrawal method selected.');
        }
    
        Withdraw::insert([
            'user_id' => auth()->user()->id,
            'getway_id' => $request->getway,  
            'amount' => $request->amount,
            'address' => $request->address, 
            'wallet_address' => $request->address,  
            'address_tag' => $request->address_tag,
            'payment_method' => $getway->name,  
            'created_at' => Carbon::now()
        ]);
    
       
        $user->decrement('balance', $request->amount);
    
        return back()->with('success', 'Request Submitted');
    }
    
    
    
   
}
