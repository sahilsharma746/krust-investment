<?php

namespace App\Http\Controllers\User;
use App\Models\User;
use App\Models\Trade;
use App\Models\Deposit;

use App\Models\UserSetting;
use Illuminate\Http\Request;
use App\Models\UserAccountType;
use App\Models\UserVerifiedStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


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



        $full_data['totalAdminCreditDeposits'] = Deposit::where('user_id', $user->id)
        ->where('payment_method', 'admin_credit')
        ->sum('amount');

        $full_data['totalAdminLoanDeposits']= Deposit::where('user_id', $user->id)
        ->where('payment_method', 'admin_loan')
        ->sum('amount');

         
        $full_data['totalAmount'] = Trade::where('user_id', $user->id)->sum('capital');
        
        $full_data['totalWinAmount'] = Trade::where('user_id', $user->id)
            ->where('trade_result', 'win')
            ->sum('trade_win_loss_amount');
        
        $full_data['totalLossAmount'] = Trade::where('user_id', $user->id)
            ->where('trade_result', 'loss')
            ->sum('trade_win_loss_amount');

        $totalWinLoss = $full_data['totalWinAmount'] + $full_data['totalLossAmount'];

        // Check if totalWinLoss is greater than zero to avoid division issues
        if ($totalWinLoss > 0) {
            $full_data['win_percentage'] = ($full_data['totalWinAmount'] / $totalWinLoss) * 100;
            $full_data['loss_percentage'] = ($full_data['totalLossAmount'] / $totalWinLoss) * 100;
        } else {
            $full_data['win_percentage'] = 0;
            $full_data['loss_percentage'] = 0;
        }
        $full_data['win_percentage'] = number_format($full_data['win_percentage'], 2);
        $full_data['loss_percentage'] = number_format($full_data['loss_percentage'], 2);


        $full_data['totalTradesCount'] = Trade::where('user_id', $user->id)->count();
        $full_data['totalWinTradesCount'] = Trade::where('user_id', $user->id)
                                            ->where('trade_result', 'win')
                                            ->count();

        if ($full_data['totalTradesCount'] > 0) {
            $full_data['winPercentage'] = ($full_data['totalWinTradesCount'] / $full_data['totalTradesCount']) * 100;
        } else {
            $full_data['winPercentage'] = 0;
        }
        $full_data['winPercentage'] = number_format($full_data['winPercentage'], 2) . '%';

        return view('users.index', compact('full_data','kycTypes'));
    }
    

    public function news() {
        return view('users.news');
    }
}
