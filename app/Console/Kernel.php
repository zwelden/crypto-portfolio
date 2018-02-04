<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\GetCryptoInfo;
use App\Jobs\UpdateAssets;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Crypto;
use App\Asset;
use App\CryptoApi\CryptoHandler;
use App\CryptoApi\Cryptos\CoinRepo;

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
        // $schedule->command('inspire')
        //          ->hourly();
       $schedule->job(new GetCryptoInfo)->everyMinute();

       // update asset ballances
       $schedule->job(new UpdateAssets('Bitcoin', 1))->hourly();
       $schedule->job(new UpdateAssets('Bitcoin Cash', 1))->hourly();
       $schedule->job(new UpdateAssets('Stellar', 1))->hourly();
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
