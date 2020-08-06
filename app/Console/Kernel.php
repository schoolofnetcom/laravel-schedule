<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // FIRST TASK
        $schedule->command('command:log-test')->everyMinute();

        // CLOSURE
        $schedule->call(function () {
            Log::info('Minha segunda task -> Schedule CLOSURE');
        })->everyMinute();

        $schedule->command('command:count-open')->everyMinute();

        // COPY FILE
        $schedule->command('command:copy-file')
            ->everyMinute()
            ->withoutOverlapping()
            ->onOneServer();

        // OUTPUT FILE
        $schedule->exec("php -v")
            ->everyMinute()
            ->appendOutputTo(public_path('/log.txt'));

        // HOOKS
        $schedule->command('command:hooks')
            ->everyMinute()
            ->before(function () {
                Log::info('Executando hook before/antes');
            })
            ->after(function () {
                Log::info('Executando hook after/depois');
            });

        // EMAIL SEND
        $schedule->command('command:send-mail')->everyMinute();

        // CRIACAO DO CRON
        // schtasks.exe /create /tn laravel-schedule /sc minute /st 13:00 /tr 'C:\wamp64\bin\php\php7.3.12\php.exe C:\wamp64\www\school\test\artisan schedule:run'

        // * * * * * C:\wamp64\bin\php\php7.3.12\php.exe C:\wamp64\www\school\laravel\artisan schedule:run
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
