<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $table = 'deposits';

    protected $fillable = [
        'user_id',
        'getway_id',
        'payment_method',
        'wallet_address',
        'amount',
        'receipt',
        'status'
    ];

    protected $guarded = [];

    public function getway() {
        return $this->hasOne(Getway::class, 'id', 'getway_id');
    }
    
    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }


    public static function getUserDepositAmount($user_id, $status = 'all'){
        $total_deposit = 0;

        if( $status == 'all' ) {
            $deposits = Deposit::where('user_id', $user_id)->get();
        }else {
            $deposits = Deposit::where('user_id', $user_id)
                                ->where('status', $status)
                                ->get();
        }
        if (!$deposits->isEmpty()) {
            foreach ($deposits as $deposit) {
                $total_deposit += $deposit->amount;
            }
        }
        return $total_deposit;
    }


    

    

}
