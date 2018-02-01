<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\GetCryptoInfo;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Crypto;

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
       $schedule->call(function () {
         $apiAddress = "https://api.coinmarketcap.com/v1/ticker/?limit=10";
         $client = new Client();
         $result = $client->request('GET', $apiAddress);
         $data = json_decode($result->getBody());

         foreach ($data as $coin) {
           $crypto = Crypto::where('name', $coin->name)
                  ->where('symbol', $coin->symbol)
                  ->first();
            if (! $crypto == null) {
                $crypto->update([
                  'latest_price' => $coin->price_usd,
                  'current_rank' => $coin->rank
                ]);
            }
         }
       })->everyMinute();
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
