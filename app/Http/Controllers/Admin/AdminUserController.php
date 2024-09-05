<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Getway;
use App\Models\UserAddress;
use App\Models\UserVerifiedStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminUserController extends Controller
{

    protected $page_title;
    public function index () {
        $page_title = 'All Users';
        $all_users = User::with('addresses')->where([['role', 'user']])->get();
        return view('admin.users.index', compact('all_users', 'page_title'));
    }
    
    public function activeUsers () {
        $page_title = 'Active Users';
        $all_users = User::with('addresses')->where([['role', 'user'], ['status', 'active']])->get();
        return view('admin.users.index', compact('all_users', 'page_title'));
    }
    
    public function kycVerified () {
        $page_title = 'KYC Verified Users';
       
        $all_users = User::join('user_verified_status', 'users.id', '=', 'user_verified_status.user_id')
            ->with('addresses')
            ->where([
                ['users.role', 'user'],
                ['user_verified_status.kyc_verify_status', 'verified']
            ])
            ->select('users.*') 
            ->get();

        return view('admin.users.index', compact('all_users', 'page_title'));
    }
    
    public function kycUnverified () {
        $page_title = 'KYC Unverified Users';
        $all_users = User::join('user_verified_status', 'users.id', '=', 'user_verified_status.user_id')
            ->with('addresses')
            ->where([
                ['users.role', 'user'],
                ['user_verified_status.kyc_verify_status', 'pending']
            ])
            ->select('users.*')
            ->get();
        return view('admin.users.index', compact('all_users', 'page_title'));
    }
    
    public function emailVerified () {
        $page_title = 'Email Verified Users';
        $all_users = User::join('user_verified_status', 'users.id', '=', 'user_verified_status.user_id')
            ->with('addresses')
            ->where([
                ['users.role', 'user'],
                ['user_verified_status.email_verify_status', 'verified']
            ])
            ->select('users.*') 
            ->get();
        return view('admin.users.index', compact('all_users', 'page_title'));
    }
    
    public function phoneVerified () {
        $page_title = 'Phone Verified Users';
        $all_users = User::join('user_verified_status', 'users.id', '=', 'user_verified_status.user_id')
            ->with('addresses')
            ->where([
                ['users.role', 'user'],
                ['user_verified_status.phone_verify_status', 'verified']
            ])
            ->select('users.*') 
            ->get();        
        return view('admin.users.index', compact('all_users', 'page_title'));
    }
    
    public function bannedVerified () {
        $page_title = 'Banned Users';
        $all_users = User::with('addresses')->where([['role', 'user'], ['status', 'baned']])->get();
        return view('admin.users.index', compact('all_users', 'page_title'));
    }

    public function details(User $user){
        $page_title = "Manage User";
        $full_data = [];
        $total_deposit_amount = Deposit::getUserDepositAmount($user->id);
        $total_withdrawl_amount = 0;
        $total_transactions = 0;
        $user_address = UserAddress::where('user_id', $user->id)->first();
        $verification_prompts_permissions_data = UserVerifiedStatus::where('user_id', $user->id)->first();

        $full_data['total_deposit_amount'] = $total_deposit_amount;
        $full_data['total_withdrawl_amount'] = $total_withdrawl_amount;
        $full_data['total_transactions'] = $total_transactions;
        $full_data['user_data'] = $user;
        $full_data['user_address'] = $user_address;
        $full_data['verification_prompts_permissions_data'] = $verification_prompts_permissions_data;

        return view('admin.users.user-detail', compact('full_data','page_title'));

    }


  

    public function user_verification (User $user) {

        
        return view('admin.users.user-detail', compact('all_users', 'page_title'));
    }
    


    public function banUser (User $user) {
        $user->update([
            'status' => 'baned'
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

        $admin_gateway_id = Getway::getAdminGatewayID();

        $remarks = isset($request->remark ) ? $request->remark : '';

        if ($request->type == 'credit') {

            Deposit::updateDepositByAdmin($user->id, $request->amount, $admin_gateway_id->id, $remarks );
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
        $user->update([
            'status' => 'deactive'
        ]);
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
