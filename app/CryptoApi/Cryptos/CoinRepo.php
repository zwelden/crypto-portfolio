<?php

namespace App\CryptoApi\Cryptos;

use App\CryptoApi\CryptoApi;
use App\CryptoApi\Cryptos\Stellar;

class CoinRepo
{
  protected static $coin_data = [
    'Litecoin' => [
      'api_prefix' => 'https://chain.so/api/v2/get_address_balance/LTC/',
      'api_postfix' => '',
      'divisor' => 1,
      'balance_route' => 'data->confirmed_balance'
    ],
    'Bitcoin' => [
      'api_prefix' => 'https://blockchain.info/q/addressbalance/',
      'api_postfix' => '',
      'divisor' => 100000000.00,
      'balance_route' => ''
    ],
    'Ethereum' => [
      'api_prefix' => 'https://api.blockcypher.com/v1/eth/main/addrs/',
      'api_postfix' => '/balance',
      'divisor' => 1000000000000000000.00,
      'balance_route' => 'balance'
    ],
    'Ripple' => [
      'api_prefix' => 'https://data.ripple.com/v2/accounts/',
      'api_postfix' => '/balances?&limit=1',
      'divisor' => 1,
      'balance_route' => 'balances[0]->value'
    ],
    'Cardano' => [
      'api_prefix' => 'https://cardanoexplorer.com/api/addresses/summary/',
      'api_postfix' => '',
      'divisor' => 1000000.00,
      'balance_route' => 'Right->caBalance->getCoin'
    ],
    'Bitcoin Cash' => [
      'api_prefix' => 'https://bch-chain.api.btc.com/v3/address/',
      'api_postfix' => '',
      'divisor' => 100000000.00,
      'balance_route' => 'data->balance'
    ]
  ];

  public static function all()
  {
    $coins = collect([
            'Litecoin' => CryptoApi::instantiate(static::$coin_data['Litecoin']),
            'Bitcoin' => CryptoApi::instantiate(static::$coin_data['Bitcoin']),
            'Ethereum' => CryptoApi::instantiate(static::$coin_data['Ethereum']),
            'Ripple' => CryptoApi::instantiate(static::$coin_data['Ripple']),
            'Cardano' => CryptoApi::instantiate(static::$coin_data['Cardano']),
            'Bitcoin Cash' => CryptoApi::instantiate(static::$coin_data['Bitcoin Cash']),
            'Stellar' => Stellar::instantiate(),
        ]);

    return $coins;
  }
}


// Bitcoin
// test account: 1EBHA1ckUWzNKN7BMfDwGTx6GKEbADUozX
// test account: 1CiAzyf5JFxDUm28oBNxt3TMsTi1EW7CLZ
// test account: 1EBHA1ckUWzNKN7BMfDwGTx6GKEbADUozX
// test account: 1NDyJtNTjmwk5xPNhjgAMu4HDHigtobu1s <- lots of activity

//cardano
// test address: DdzFFzCqrht6HeUvMHcx4Cg92L9srNj1g4rDM5AG7ESfPENiVVRxcWhJTiEw5JpEPebi3LbxgSrkNqiTGZGhEG2sbpDJJqoWYhENbQ8E
// test address: DdzFFzCqrhskDyGkELMhEzcqAvMF7iGxBHS9tLGCXeKRp8Gncn3HQRSsVcbqi5NUTJkseLh5adwkw9bsMzB6x6eHVHR9FrLFXbqWFRA7

// Ethereum
// test account: 0x900d0881a2e85a8e4076412ad1cefbe2d39c566c

// Litecoin
// test account: LPpVeFSKvH593CChqP9qpV5toEXntekjiF

// Ripple
// test account: r3kmLJN5D28dHuH8vZNUZpMC43pEHpaocV

// Bitcoin cash
// 17CzhFvGwH6TT46JtzhnhMpTw4mHYpEGCR
// 1AhWi2gpuqWRWxx2ymedpcwi4ACznaBeYD
