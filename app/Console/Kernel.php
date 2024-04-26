<?php

namespace App\Console;

use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('gh:invoice-ipl')->dailyAt('16:42')->timezone('Asia/Jakarta');
        // $schedule->command('gh:invoice-ipl')->monthlyOn(Carbon::now()->endOfMonth()->day, '23:59')->timezone('Asia/Jakarta')->appendOutputTo(storage_path('logs/scheduler/invoice-ipl.log'));
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
