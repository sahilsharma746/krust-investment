<?php

namespace App\Console\Commands;

use App\Models\Trade;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class UpdatedTradesStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:updated-trades-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
 
    
        public function handle()
        {
            $trades = Trade::where('status', '0')->get();
        
            foreach ($trades as $trade) {
                preg_match('/(\d+)\s*(\w+)/', $trade->time_frame, $matches);
        
                if (count($matches) === 3) {
                    $time_value = (int)$matches[1];   
                    $time_unit = strtolower($matches[2]); 
                } else {
                    echo "Invalid time frame format for trade ID: " . $trade->id . PHP_EOL;
                    continue;
                }
        
                $trade_time = \Carbon\Carbon::parse($trade->created_at);
        
                switch ($time_unit) {
                    case 'minute':
                    case 'minutes':
                        $trade_complete_time = $trade_time->addMinutes($time_value);
                        break;
                    case 'hour':
                    case 'hours':
                        $trade_complete_time = $trade_time->addHours($time_value);
                        break;
                    case 'day':
                    case 'days':
                        $trade_complete_time = $trade_time->addDays($time_value);
                        break;
                    default:
                        echo "Unknown time frame unit: " . $time_unit . " for trade ID: " . $trade->id . PHP_EOL;
                        continue 2;
                }
                        $current_time = now();
        
                if ($current_time >= $trade_complete_time) {
                    $trade->status = 1;
                    $trade->save();
        
                    echo "Trade status updated to 1 for user_id: " . $trade->user_id . " at " . $current_time->format('Y-m-d H:i:s') . PHP_EOL;
                } else {
                    $time_remaining = $current_time->diff($trade_complete_time);
                    
                    $remaining_string = sprintf(
                        '%d days, %d hours, %d minutes, %d seconds',
                        $time_remaining->d,
                        $time_remaining->h,
                        $time_remaining->i,
                        $time_remaining->s
                    );
        
                    $for_humans = $trade_complete_time->diffForHumans($current_time, [
                        'parts' => 4,
                        'short' => true,
                        'syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE
                    ]);
        
                    echo "Time remaining for trade to complete for user_id: " . $trade->user_id . ":" . PHP_EOL;
                    
                    echo "Time remaining for trade to complete : " . $for_humans . PHP_EOL;
                }
            }
        
        
    }
    
}
