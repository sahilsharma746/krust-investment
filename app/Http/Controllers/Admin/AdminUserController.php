<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Withdraw;
use App\Models\Getway;
use App\Models\UserAddress;
use App\Models\UserVerifiedStatus;
use App\Models\UserSetting;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminUserController extends Controller
{

    protected $page_title;

    public $user_setting;

    public function __construct()
    {
        $this->user_setting = new UserSetting();
    }

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
        $user_settings = $this->user_setting->getUserAllSetting($user->id);
        
        $full_data['total_deposit_amount'] = $total_deposit_amount;
        $full_data['total_withdrawl_amount'] = $total_withdrawl_amount;
        $full_data['total_transactions'] = $total_transactions;
        $full_data['user_data'] = $user;
        $full_data['user_address'] = $user_address;
        $full_data['verification_prompts_permissions_data'] = $verification_prompts_permissions_data;
        $full_data['user_settings'] = $user_settings;

        return view('admin.users.user-detail', compact('full_data','page_title'));
    }


    public function editUserPaymentSettings(Request $request, User $user) {

        $bitcoin_address = config('settingkeys.bitcoin_address_key');
        if ( isset( $request->$bitcoin_address ) && !empty( $request->$bitcoin_address)) {
            $this->user_setting->updatUserSetting( $bitcoin_address, $request->$bitcoin_address, $user->id );
        }

        $bitcoin_address_tag_key = config('settingkeys.bitcoin_address_tag_key');
        if ( isset( $request->$bitcoin_address_tag_key ) && !empty( $request->$bitcoin_address_tag_key)) {
            $this->user_setting->updatUserSetting( $bitcoin_address_tag_key, $request->$bitcoin_address_tag_key, $user->id );
        }

        $usdt_address_key = config('settingkeys.usdt_address_key');
        if ( isset( $request->$usdt_address_key ) && !empty( $request->$usdt_address_key)) {
            $this->user_setting->updatUserSetting( $usdt_address_key, $request->$usdt_address_key, $user->id );
        }

        $usdt_address_tag_key = config('settingkeys.usdt_address_tag_key');
        if ( isset( $request->$usdt_address_tag_key ) && !empty( $request->$usdt_address_tag_key)) {
            $this->user_setting->updatUserSetting( $usdt_address_tag_key, $request->$usdt_address_tag_key, $user->id );
        }

        $xmr_address_key = config('settingkeys.xmr_address_key');
        if ( isset( $request->$xmr_address_key ) && !empty( $request->$xmr_address_key)) {
            $this->user_setting->updatUserSetting( $xmr_address_key, $request->$xmr_address_key, $user->id );
        }

        $xmr_address_tag_key = config('settingkeys.xmr_address_tag_key');
        if ( isset( $request->$xmr_address_tag_key ) && !empty( $request->$xmr_address_tag_key)) {
            $this->user_setting->updatUserSetting( $xmr_address_tag_key, $request->$xmr_address_tag_key, $user->id );
        }

        $paypal_key = config('settingkeys.paypal_key');
        if ( isset( $request->$paypal_key ) && !empty( $request->$paypal_key)) {
            $this->user_setting->updatUserSetting( $paypal_key, $request->$paypal_key, $user->id );
        }

        $bank_key = config('settingkeys.bank_key');
        if ( isset( $request->$bank_key ) && !empty( $request->$bank_key)) {
            $this->user_setting->updatUserSetting( $bank_key, $request->$bank_key, $user->id );
        }

        $account_type_key = config('settingkeys.account_type_key');
        if ( isset( $request->$account_type_key ) && !empty( $request->$account_type_key)) {
            $this->user_setting->updatUserSetting( $account_type_key, $request->$account_type_key, $user->id );
        }

        $account_number_key = config('settingkeys.account_number_key');
        if ( isset( $request->$account_number_key ) && !empty( $request->$account_number_key)) {
            $this->user_setting->updatUserSetting( $account_number_key, $request->$account_number_key, $user->id );
        }

        $sort_code_key = config('settingkeys.sort_code_key');
        if ( isset( $request->$sort_code_key ) && !empty( $request->$sort_code_key)) {
            $this->user_setting->updatUserSetting( $sort_code_key, $request->$sort_code_key, $user->id );
        }

        return to_route('admin.user.details', $user->id )->with('success', 'Updated Successfully');

    }


    public function user_verification (User $user) {
        return view('admin.users.user-detail', compact('all_users', 'page_title'));
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
                Withdraw::updateWithdrawalByAdmin($user->id, $request->amount, $admin_gateway_id->id, $remarks );
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
        $user->update([ 'status' => 'deactive' ]);
        $arr = explode('/', $user->avatar);
        $img = end($arr);
        if ($img != 'avatar.png') {
            $file_path = public_path('uploads/user_avatar/' . $user_data->avatar);
            unlink(base_path($user->avatar));
        }
        // $user->delete();
        return back()->with('success', 'Deleted Successfully');
    }


    public function banUser (User $user) {
        $user->update([ 'status' => 'baned' ]);
        return back()->with('success', 'Banned Succesfully');
    }


    public function UnbanUser (User $user) {
        $user->update([ 'status' => 'active' ]);
        return back()->with('success', 'User UnBanned Succesfully');
    }



    public function loginAsUser(User $user){
        // Save the admin's ID to restore later
        session(['admin_id' => Auth::id()]);

        // Log in as the selected user
        Auth::login($user);

        // Redirect to the user dashboard (or any desired page)
        return redirect()->route('user.dashboard')->with('success', 'Logged in as ' . $user->first_name . " " . $user->last_name );
    }

    public function form () {
        return view('admin.form');
    }
}
