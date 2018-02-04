<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Crypto;
use App\Asset;
use App\CryptoApi\Cryptos\CoinRepo;
use App\CryptoApi\CryptoHandler;

class UpdateAssets implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $crypto_name;
    protected $rate_limit;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($crypto_name, $rate_limit)
    {
      $this->crypto_name = $crypto_name;
      $this->rate_limit = $rate_limit; // seconds to wait between api calls
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $crypto_id = Crypto::where('name', $this->crypto_name)->first()->id;
      $assets = Asset::where('crypto_id', $crypto_id)->get();
      $coin = CoinRepo::all()[$this->crypto_name];

      foreach ($assets as $asset) {
        CryptoHandler::updateBalance($coin, $asset);
        sleep($this->rate_limit);
      }
    }
}
