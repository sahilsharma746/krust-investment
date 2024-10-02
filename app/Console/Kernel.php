<?php

namespace App\Console;




use Illuminate\Support\Facades\Log;
use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\UpdatedTradesStatus;
use App\Console\Commands\ProcessedCompletedTrades;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\ProcessedCompletedTrades::class,
        \App\Console\Commands\UpdatedTradesStatus::class,
    ];
    

    protected function schedule(Schedule $schedule){

        throw new \Exception("Scheduler hit");

        

        \Log::info('Scheduler running...');

        die("****");
        
        $schedule->command('app:processed-completed-trades')
            ->everyMinute()
            ->before(function () {
                \Log::info('Starting app:processed-completed-trades');
            })
            ->after(function () {
                \Log::info('Finished app:processed-completed-trades');
            });

        $schedule->command('app:updated-trades-status')
            ->everyMinute()
            ->before(function () {
                \Log::info('Starting app:updated-trades-status');
            })
            ->after(function () {
                \Log::info('Finished app:updated-trades-status');
            });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
