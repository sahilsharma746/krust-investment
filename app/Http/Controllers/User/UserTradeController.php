<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UserTradeController extends Controller
{

    public function index() {
    
        return view('users.marketWatch.index');
    
    }


}