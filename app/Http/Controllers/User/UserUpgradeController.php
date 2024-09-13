<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Getway;
use App\Models\Deposit;
use App\Models\Withdraw;

use App\Models\UserSetting;
use Illuminate\Http\Request;
use App\Models\UserAccountType;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Models\UserAccountTypeFeature;

class UserUpgradeController extends Controller
{

       
    // public $user_setting;

    public function __construct(){
        // $this->user_setting = new UserSetting();
    }
    
    public function index(){
        $user = Auth::user();
        $plan_with_features = DB::table('user_account_types')
            ->leftJoin('table_user_account_types_features', 'user_account_types.id', '=', 'table_user_account_types_features.plan_id')
            ->select('user_account_types.id as plan_id', 'user_account_types.name', 'user_account_types.price',
                     'table_user_account_types_features.feature_description', 'table_user_account_types_features.feature_order', 
                     'table_user_account_types_features.feature_available')
            ->get();

        $plans = $plan_with_features->groupBy('plan_id');

        return view('users.upgrade.index', compact('user','plans'));
    }


    public function UpgradeUserPlan(Request $request){

        $user_id = $request->input('user_id');
        $plan_id = $request->input('plan_id');
    
        // Find the user and update the account type
        $user = User::find($user_id);
        if ($user) {
            $user->account_type = $plan_id;
            $user->save();
            
            return redirect()->back()->with('success', 'Account upgraded successfully!');
        }
    
        return redirect()->back()->with('error', 'User not found!');
    
    }
 

}
