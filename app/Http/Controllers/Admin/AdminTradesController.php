<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Trade;
use App\Models\Deposit;
use App\Models\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminTradesController extends Controller
{

    public $user_setting;
    public function __construct(){
        $this->user_setting = new UserSetting();
    }


    public function getAllTrades(){

        // $trades = Trade::all();
        $trades = Trade::with('user')->get();
    
        return view('admin.trades.index',compact('trades'));
    }


    public function saveTradeResult(Request $request, $user_id){

        $this->user_setting->updatUserSetting('trade_result', $request->trade_result, $user_id);

        $this->user_setting->updatUserSetting('trade_percentage', $request->trade_percentage, $user_id);

        return redirect()->back()->with('success', ' Updated successfully.');
    }


    public function deleteTrade( Request $request, $trade_id){

        dd( $trade_id );


    }

}