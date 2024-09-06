<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Getway;
use App\Models\Deposit;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use App\Models\UserAccountType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;




class UserDepositController extends Controller
{
    public function index() {
       
        $user = Auth::user();
        $datas = Deposit::with('getway')->where('user_id', auth()->user()->id)->latest()->get();
        $withdrawals = Withdraw::where('user_id', $user->id)->with('getway')->get();
        $getways = Getway::where([['deposit', 'yes'], ['name', '!=', 'admin']])->get();

        return view('users.deposit.getway', compact('datas', 'getways','withdrawals'));
    }


    public function storeUserDeposit(Request $request, $id) {

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


    
    public function sendUserDepositTransferEmail(Request $request, $id) {
            $user = Auth::user();
            $getway = Getway::where('id', $id)->first();

            // Details to be passed to the email view
            $details = [
                'payment_method' => $getway->name,
                'body' => "You are requesting a transfer."
            ];
            
            // Deposit::insert([
            //     'user_id' => $user_id,
            //     'getway_id' => $id,
            //     'payment_method'=> $getway->name,
            //     'amount' => $request->amount,
            //     'wallet_address' => $request->wallet_address,
            //     'address_tag'=>  $request->address_tag,
            //     'created_at' => Carbon::now()
            // ]);

            // Sending email
            Mail::send('emails.deposit-transfer', ['details' => $details], function($message) use ($user) {
                $message->to($user->email)
                        ->subject('Test Email from Laravel');
            });

        return back()->with('success', 'Your Requeste Submited Successfully');
    }



    
}
