<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Deposit;
use App\Models\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminTradesController extends Controller
{


    public function getAllTrades(){
     
        return view('admin.trades.index');
    }

    public function saveTradeResult(Request $request,$user_id)

    { 
        UserSetting::updateOrCreate([
            'user_id' => $user_id,
            'option_name' => 'trade_result',
            'option_value' => $request->trade_result,
        ]);

        UserSetting::updateOrCreate([
            'user_id' => $user_id,
            'option_name' => 'trade_percentage',
            'option_value' => $request->trade_percentage,
        ]);

        return redirect()->back()->with('success', ' Updated successfully.');
    }


}