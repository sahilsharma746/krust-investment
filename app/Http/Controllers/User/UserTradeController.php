<?php

namespace App\Http\Controllers\User;


use App\Models\UserSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class UserTradeController extends Controller
{

    public function index() {

        $user_id = Auth::user()->id;
       
        // $user_trade_percentage = user_setting::getuser_setting
        $user_setting = new UserSetting();
        
        $user_trade_result = $user_setting->getUserSetting('trade_result', $user_id);
        $user_trade_percentage = $user_setting->getUserSetting('trade_percentage', $user_id);

        if ($user_trade_result === false || $user_trade_percentage === false) {
            $user_trade_percentage = $user_trade_percentage === false ? 10 : $user_trade_percentage;
            $user_trade_result = $user_trade_result === false ? 'random' : $user_trade_result;

            if ($user_trade_result === 'random') {
                $user_trade_result = rand(1, 2) === 1 ? 'win' : 'loss';
            }

        }
    
        // $forex_url = config('services.currencylayer.url');
        // $forex_response = Http::get($forex_url);
        // $forex_data = $forex_response->json();

        // $crypto_url = config('services.cryptocompare.url');
        // $crypto_response = Http::get($crypto_url);
        // $crypto_data = $crypto_response->json();

        // $indices_url = config('services.exchangerate.url');
        // $indices_response = Http::get($indices_url);
        // $indices_data = $indices_response->json();

        // $forex_data = '';
        // $crypto_data = '';
        // $indices_data = '';
        $user_balance = '';


        




        return view('users.trade.index', compact('user_balance','user_trade_result','user_trade_percentage'));
        
    }


}