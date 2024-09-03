<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Getway;
use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class UserDepositController extends Controller
{
    public function index() {
        $datas = Deposit::with('getway')->where('user_id', auth()->user()->id)->latest()->get();
        $getways = Getway::where('deposit', 'yes')->get();
        return view('users.deposit.getway', compact('datas', 'getways'));
    }

    public function store(Request $request, $id) {

        $getway = Getway::where('id', $id)->first();

        $request->validate([
            'amount' => 'required | numeric | min:1',
            'receipt' => 'required | image | mimes:jpg,png,jpeg',
            'wallet_address'=>'required',
            
        ]);

        // $path = public_path('uploads/');
        // $file = $request->file('receipt');
        // $fileName = time().'-receipt.'.auth()->user()->id.'.'.$file->getClientOriginalExtension();
        // $request->receipt->move($path, $fileName);
        
        $path = public_path('uploads/');

    $userId = auth()->user()->id;
    
    $userFolderPath = $path . $userId . '/';
    
    if (!File::exists($userFolderPath)) {
        File::makeDirectory($userFolderPath, 0755, true);
    }

    $file = $request->file('receipt');
    $fileName = time() . '-receipt.' . $userId . '.' . $file->getClientOriginalExtension();
    $file->move($userFolderPath, $fileName);


        Deposit::insert([
            'user_id' => auth()->user()->id,
            'getway_id' => $id,
            'payment_method'=> $getway->name,
            'amount' => $request->amount,
            'wallet_address' => $request->wallet_address,
            'receipt' => $path.$fileName,
            'created_at' => Carbon::now()
        ]);

        return back()->with('success', 'Submited Successfully');
    
    }


    
    
    
}
