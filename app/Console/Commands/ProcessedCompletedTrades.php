<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Trade;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;


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
    // public function handle()
    // {
    //     $trades = Trade::where('status', '1')->get();
    
    //     foreach ($trades as $trade) {
    
    //         $trade_result_percentage = $trade->admin_trade_result_percentage;
    //         $contract_size = $trade->contract_size;
        
    //         $trade_win_loss_amount = ($trade_result_percentage / 100) * $contract_size;
    
    //         $user_trade_result = $trade->trade_result;
    //         $user_trade_amount = $trade->capital;
    
    //         if ($user_trade_result == 'win') {
    //             $winloss_amount = $user_trade_amount + $trade_win_loss_amount;
    //             dd("win amount ->".$winloss_amount);
    //         } else {
    //             $winloss_amount = $user_trade_amount - $trade_win_loss_amount;
    //             dd("loss amount ->".$winloss_amount);
    //         }
    
    //     }
        
    // }

    public function handle()
    {
        $trades = Trade::where('status', '1')->get();
    
        foreach ($trades as $trade) {
            $user_id = $trade->user_id;
            $trade_win_loss_amount = $trade->trade_win_loss_amount; 
            $user_trade_result = $trade->trade_result; 
            $user = User::find($user_id);
    
            if ($user) { // Check if the user exists
                $amount = $user->balance;
    
                if ($user_trade_result == 'win') {
                    // Update the balance for a win
                    $user->balance = $amount + $trade_win_loss_amount;
                } elseif($user_trade_result == 'loss') {
                    // Update the balance for a loss
                    $user->balance = $amount - $trade_win_loss_amount;
                }
    
                // Save the updated user balance
                $user->save();
    
                echo $user_id  . PHP_EOL;
                echo $user->balance . PHP_EOL;
            }
        }
    }
    
    
}

