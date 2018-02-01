<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Http\Controllers\CryptoController;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class GetCryptoInfo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->apiAddress = 'https://api.coinmarketcap.com/v1/ticker/?limit=10';
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $apiAddress = "https://api.coinmarketcap.com/v1/ticker/?limit=10";
        $client = new Client();
        $result = $client->request('GET', $apiAddress);
        CryptoController::setTestData($result->getBody());
    }
}
