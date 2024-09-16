<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\UserSetting;


class UserTradeController extends Controller
{

    public $user_setting;
    public function __construct(){
        $this->user_setting = new UserSetting();
    }

    public function index() {
        $user = Auth::user();

        $user_balance = $user->balance;

        $trade_result_type = ( $this->user_setting->getUserSetting('trade_result', $user->id ) ) ?  $this->user_setting->getUserSetting('trade_result', $user->id ) : config('settingkeys.trade_result');

        $trade_result_percentage = ( $this->user_setting->getUserSetting('trade_percentage', $user->id ) ) ? $this->user_setting->getUserSetting('trade_percentage', $user->id ) :  config('settingkeys.trade_percentage');

        if( $trade_result_type == 'random' ) {
            $trade_result = ( rand(1,2) == 1 ) ? 'win' : 'loss';
        }else{
            $trade_result = $trade_result_type;
        }

        return view('users.trade.index' , compact('trade_result', 'trade_result_percentage','user_balance'));
    
    }


}
