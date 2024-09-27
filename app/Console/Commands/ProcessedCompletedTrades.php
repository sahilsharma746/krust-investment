<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Trade;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;



class ProcessedCompletedTrades extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:processed-completed-trades';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = ' update the  process complete trade in every 10 minuts ';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        \Log::info("Processed completed trades command ran at " . now());

        $trades = Trade::where('status', '1')->get();
    
        foreach ($trades as $trade) {
            $user_id = $trade->user_id;
            $trade_win_loss_amount = $trade->pnl; 
            $user_trade_result = $trade->trade_result; 
            $user = User::find($user_id);
    
            if ($user) { // Check if the user exists
                $user->balance += $trade_win_loss_amount;
    
                // Save the updated user balance
                $user->save();
    
                echo "user_ID: " . $user_id  . PHP_EOL;
                echo $user->balance . PHP_EOL;
                echo "result: " . $user_trade_result . ", amount: " . $trade_win_loss_amount . PHP_EOL;
            }
        }
    }
    
    
}
