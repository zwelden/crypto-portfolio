<?php

namespace App\CryptoApi;

use App\CryptoApi\Cryptos\Stellar;
use App\CryptoApi\Cryptos\CoinRepo;

class CryptoHandler
{
  /**
   * get the balance for a crypto when adding it as an asset
   *
   * @param $crypto_name - String - crypto asset type
   * @param $address - String - wallet address of crypto asset
   * @return $wallet_balance
   */
  public static function getBalance ($crypto_name, $address)
  {
    $coin = CoinRepo::all()[$crypto_name];
    $wallet_balance = $coin->getBalance($address);

    return $wallet_balance;
  }

  /**
   * update a crypto asset (currently used by cron job)
   *
   * @param $coin - App\CryptoApi\Cryptos\CoinRepo - an instantiated coin repo class
   * @param $asset - App\Asset - an Asset model
   * @return void
   */
  public static function updateBalance($coin, $asset)
  {
    $address = $asset->address;
    $wallet_balance = $coin->getBalance($address);
    $asset->wallet_balance = $wallet_balance;
    $asset->save();
  }
}
