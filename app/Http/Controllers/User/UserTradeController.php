<?php

namespace App\Http\Controllers\User;


use App\Models\Trade;
use App\Models\UserSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class UserTradeController extends Controller
{

    public function index() {

        $user = Auth::user();
        $user_id = $user->id;
        
        $trades = Trade::where('user_id', $user_id)->get();
        $user_setting = new UserSetting();
        
        $user_trade_result = $user_setting->getUserSetting('trade_result', $user_id);
        $user_trade_percentage = $user_setting->getUserSetting('trade_percentage', $user_id);

        if ($user_trade_result === false || $user_trade_percentage === false) {
            $user_trade_percentage = $user_trade_percentage === false ? 10 : $user_trade_percentage;
            $user_trade_result = $user_trade_result === false ? 'random' : $user_trade_result;
        }

        if ($user_trade_result === 'random') {
            $user_trade_result = rand(1, 2) === 1 ? 'win' : 'loss';
        }
   
        $user_balance = $user->balance;

        return view('users.trade.index', compact('user_balance','user_trade_result','user_trade_percentage','trades'));
    }


    public function storeTrades(Request $request) {

        dd( $request );

        $trade = Trade::create([
            'user_id' => auth()->user()->id,
            'name' => $request['name'],
            'asset' => $request['name'],
            'margin' => $request['margin'],
            'contract_size' => $request['contract_size'],
            'capital' => $request['amount'],
            'trade_type' => 'live',
            'entry' => $request['units'],
            'pnl' => $request['payout'],
            'fees' => $request['fees'],
            'order_type' => $request['action'],
            'time_frame' => $request['time_frame'],
            'trade_result' => $request['trade_result'],
            'admin_trade_result_percentage' => $request['trade_result_percentage'],
        ]);
        return redirect()->back()->with('success', 'Your trade has been successfully placed!');
    }
    

    public function tradingHistoryView(){
        $user = Auth::user();
        $user_id = $user->id;
        $trades = Trade::where('user_id', $user_id)->get();
        $user_trades = [];
        return view('users.trading-history.index', compact('user_trades','trades'));
    
    }
     
    
    public function tradingBotsView(){
        $user_trades = [];
        return view('users.trading-bots.index', compact('user_trades'));
    }

}




