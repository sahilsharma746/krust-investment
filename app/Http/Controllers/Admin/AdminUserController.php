<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Deposit;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{

    protected $page_title;

    public function __construct()
    {
        $this->middleware(['is_admin']);
        $this->page_title = 'Manage User';
    }


    public function index () {
        $page_title = $this->page_title;
        $all_users = User::with('addresses')->get();
        return view('admin.users.index', compact('all_users', 'page_title'));
    }


    public function activeUsers () {
        $page_title = $this->page_title;
        $all_users = User::with('addresses')->where([['role', 'user'], ['status', 'active']])->get();
        return view('admin.users.index', compact('all_users', 'page_title'));
    }


    public function kycVerified () {
        $page_title = $this->page_title;
        $all_users = User::with('addresses')->where([['role', 'user'], ['status', 'active']])->get();

        // $all_users = User::with('address')
        //      ->where('role', 'user') 
        //      ->whereHas('verifiedStatus', function ($query) {
        //          $query->where('kyc_verify_status', 'verified');
        //      })
        //      ->get();
        return view('admin.users.index', compact('all_users', 'page_title'));
    }


    public function kycUnverified () {
        $page_title = $this->page_title;
        $all_users = User::with('addresses')->where([['role', 'user'], ['status', 'active']])->get();

        // $all_users = User::with('address')
        //      ->where('role', 'user') // Add the condition to check for the user role
        //      ->whereHas('verifiedStatus', function ($query) {
        //         $query->where('kyc_verify_status', 'pending')
        //                 ->orWhere('kyc_verify_status', 'rejected');
        //      })
        //      ->get();
        return view('admin.users.index', compact('all_users', 'page_title'));
    }


    public function emailVerified () {
        $page_title = $this->page_title;
        $all_users = User::with('addresses')->where([['role', 'user'], ['status', 'active']])->get();

        return view('admin.users.index', compact('all_users', 'page_title'));
    }


    public function phoneVerified () {
        $page_title = $this->page_title;
        $all_users = User::with('addresses')->where([['role', 'user'], ['status', 'active']])->get();
        return view('admin.users.index', compact('all_users', 'page_title'));
    }


    public function bannedVerified () {
        $page_title = $this->page_title;
        $all_users = User::with('addresses')->where([['role', 'user'], ['status', 'active']])->get();
        return view('admin.users.index', compact('all_users', 'page_title'));
    }

    public function details(User $user){
        $page_title = "Manage User";
        $full_data = [];
        $total_deposit_amount = Deposit::getUserDepositAmount($user->id);
        $total_withdrawl_amount = 0;
        $total_transactions = 0;
        $user_address = UserAddress::where('user_id', $user->id)->first();
        $verification_prompts_permissions_data = '';


        $full_data['total_deposit_amount'] = $total_deposit_amount;
        $full_data['total_withdrawl_amount'] = $total_withdrawl_amount;
        $full_data['total_transactions'] = $total_transactions;
        $full_data['user_data'] = $user;
        $full_data['user_address'] = $user_address;
        $full_data['verification_prompts_permissions_data'] = $verification_prompts_permissions_data;

        return view('admin.users.user-detail', compact('full_data','page_title'));

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
