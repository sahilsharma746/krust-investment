<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Trade;
use Illuminate\Console\Command;
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
    protected $description = 'Update the processed complete trades every 10 minutes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info("Processed completed trades command ran at " . now());

        $trades = Trade::where('status', '1')->get();

        foreach ($trades as $trade) {
            $user_id = $trade->user_id;
            $trade_win_loss_amount = $trade->pnl; 
            $user_trade_result = $trade->trade_result; 
            $user = User::find($user_id);

            if ($user) { // Check if the user exists
                // Update balance based on the trade result
                $user->balance += $trade_win_loss_amount;

                // Save the updated user balance
                $user->save();

                // Log user balance update
                Log::info("User ID: {$user_id}, New Balance: {$user->balance}, Result: {$user_trade_result}, Amount: {$trade_win_loss_amount}");
            } else {
                Log::warning("User not found for User ID: {$user_id}");
            }
        }
    }
}
