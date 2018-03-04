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
use App\Crypto;

class GetCryptoInfo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     *
     * Coinmarketcap.com api address
     *
     */
    protected $apiAddress = 'https://api.coinmarketcap.com/v1/ticker/?limit=100';

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
      // ..
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $client = new Client();
      $result = $client->request('GET', $this->apiAddress);
      $data = json_decode($result->getBody());

      foreach ($data as $coin) {
        Crypto::updateOrCreate([
          'name' => $coin->name,
          'symbol' => $coin->symbol
        ],
        [
          'latest_price' => $coin->price_usd,
          'current_rank' => $coin->rank
        ]);
      }
    }
}
