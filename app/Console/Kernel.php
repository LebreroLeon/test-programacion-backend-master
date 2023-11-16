<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected $commands = [
        'Hoyvoy\Currencies\Application\Command\UpdateCurrencyRatesCommand',
        'Hoyvoy\Currencies\Application\Command\UpdateCurrencyNamesCommand'
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('currencies:update-rates')->hourly();
        $schedule->command('currencies:update-names')->hourly();
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
