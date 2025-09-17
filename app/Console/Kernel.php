<?php

namespace App\Console;

use App\Console\Commands\BroadcastToSubscribers;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        // Example: schedule monthly greeting on 1st of month at 9am
        // $schedule->command('newsletter:broadcast "Happy new month from PECWOM" --text="Wishing you a wonderful month ahead!"')->monthlyOn(1, '09:00');
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
        $this->commands([
            BroadcastToSubscribers::class,
        ]);
    }
}


