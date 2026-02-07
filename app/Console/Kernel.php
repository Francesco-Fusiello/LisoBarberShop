<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    // Registriamo il comando
    protected $commands = [
        \App\Console\Commands\FetchGoogleReviews::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        // Aggiorna le recensioni Google ogni giorno alle 3:00 AM
        $schedule->command('fetch:google-reviews')->dailyAt('03:00');
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
