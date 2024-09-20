<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;
    protected $table = 'trades';

    protected $fillable = [
        'user_id',
        'asset',
        'name',
        'margin',
        'contract_size',
        'capital',
        'trade_type',
        'entry',
        'pnl',
        'order_type',
        'time_frame',
        'trade_result',
        'admin_trade_result_percentage',
        'trade_win_loss_amount'
    ];

public function user()
{
    return $this->belongsTo(User::class, 'user_id'); 
}

}
