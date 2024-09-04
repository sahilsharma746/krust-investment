<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Getway;
use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\UserAccountType;



class UserDepositController extends Controller
{
    public function index() {
        $user = Auth::user();
        $datas = Deposit::with('getway')->where('user_id', auth()->user()->id)->latest()->get();
        $getways = Getway::where([['deposit', 'yes'], ['name', '!=', 'admin']])->get();
        return view('users.deposit.getway', compact('datas', 'getways'));
    }

    public function store(Request $request, $id) {

        $getway = Getway::where('id', $id)->first();
        $request->validate([
            'amount' => 'required | numeric | min:1',
            'receipt' => 'required | image | mimes:jpg,png,jpeg',
            'wallet_address'=>'required',
        ]);
        
        $base_path = public_path('uploads/deposit_receipt/');

        $user_id = auth()->user()->id;
        $user_folder_path = $base_path . $user_id . '/';
    
        if (!File::exists($user_folder_path)) {
            File::makeDirectory($user_folder_path, 0755, true);
        }

        $file = $request->file('receipt');
        $file_name = time() . '-receipt.' . $user_id . '.' . $file->getClientOriginalExtension();
        $file->move($user_folder_path, $file_name);
        Deposit::insert([
            'user_id' => $user_id,
            'getway_id' => $id,
            'payment_method'=> $getway->name,
            'amount' => $request->amount,
            'wallet_address' => $request->wallet_address,
            'address_tag'=>  $request->address_tag,
            'receipt' => $file_name,
            'created_at' => Carbon::now()
        ]);

        return back()->with('success', 'Your Requeste Submited Successfully');
    }
    
}
