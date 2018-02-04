<?php

namespace App\CryptoApi\Cryptos;

use App\Crypto;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class Stellar
{
  protected static $api = 'https://horizon.stellar.org/accounts/';

  public static function getBalance($wallet_address)
  {
    $apiAddress = static::$api . $wallet_address;
    $client = new Client();
    $result = $client->request('GET', $apiAddress);

    $data = json_decode($result->getBody(), true);
    $balances = $data['balances'];
    $balance_raw = 0;

    foreach ($balances as $balance) {
      if ($balance['asset_type'] == 'native') {
        $balance_raw = $balance['balance'];
      }
    }
    $wallet_balance = floatval($balance_raw);

    return $wallet_balance;
  }

  public static function instantiate()
  {
    return new static;
  }
}


// test GATB5F7BAC6TC5IDGBVWTP6KV3OD4RXLQCJSI2BTRJAYWU6MZABAZNLJ
// test GB6YPGW5JFMMP2QB2USQ33EUWTXVL4ZT5ITUNCY3YKVWOJPP57CANOF3 <- lots of activity
