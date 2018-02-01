<?php

namespace App\CryptoApi;

use App\CryptoApi\Cryptos\Stellar;
use App\CryptoApi\Cryptos\CoinRepo;

class CryptoHandler
{

  public static function getBalance ($crypto_name, $address)
  {
    if ($crypto_name == 'Stellar') {
      $wallet_balance = Stellar::getBalance($address);
    } else {
      $coin = CoinRepo::all()[$crypto_name];
      $wallet_balance = $coin->getBalance($address);
    }

    return $wallet_balance;
  }
}
