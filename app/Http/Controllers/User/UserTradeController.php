<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;


class UserTradeController extends Controller
{

    public function index() {

        // $forex_url = config('services.currencylayer.url');
        // $forex_response = Http::get($forex_url);
        // $forex_data = $forex_response->json();

        // $crypto_url = config('services.cryptocompare.url');
        // $crypto_response = Http::get($crypto_url);
        // $crypto_data = $crypto_response->json();

        // $indices_url = config('services.exchangerate.url');
        // $indices_response = Http::get($indices_url);
        // $indices_data = $indices_response->json();

        $forex_data = '';
        $crypto_data = '';
        $indices_data = '';
        $user_balance = '';
        $trade_result_percentage = '10';
        $trade_result = 'win';

        return view('users.trade.index', compact('user_balance','trade_result_percentage','trade_result','forex_data','crypto_data','indices_data'));
        
    }


}