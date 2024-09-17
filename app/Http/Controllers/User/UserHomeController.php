<?php

namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Deposit;
use App\Models\UserSetting;
use App\Models\UserAccountType;
use App\Models\UserVerifiedStatus;


class UserHomeController extends Controller
{
  

    public function index() {
        $full_data = [];
        $user = Auth::user();
        $user_data = User::with('addresses')
            ->where([['role', 'user'], ['id', $user->id]])
            ->first();
        $full_data['userVerifiedStatus'] = UserVerifiedStatus::where('user_id', $user->id)->first();

        $full_data['total_deposit'] = Deposit::getUserDepositAmount($user->id);
        $full_data['total_approved_deposit'] = Deposit::getUserDepositAmount($user->id, 'approved');


        
        $settings = UserSetting::where('user_id', $user->id)
            ->whereIn('option_name', ['dashboard_currency', 'profile_language'])
            ->get()->keyBy('option_name');
            
        $full_data['setting_info'] = [
            'dashboard_currency' => $settings['dashboard_currency']->option_value ?? 'USD',
            'profile_language' => $settings['profile_language']->option_value ?? 'en',
        ];
        $user_verifications = UserVerifiedStatus::where('user_id', $user->id)->first();

        $full_data['user_verifications'] = $user_verifications;
        $full_data['countries'] = config('countries');
        $full_data['languages'] = config('languages');
        $full_data['currencies'] = config('currencies');
        $kycTypes = config('settingkeys.kyc_type');
        $full_data['user_data'] = $user_data;
    
        return view('users.index', compact('full_data','kycTypes'));
    }
    

    public function news() {
        return view('users.news');
    }
}
