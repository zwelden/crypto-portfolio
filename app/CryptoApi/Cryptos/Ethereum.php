<?php

namespace App\CryptoApi\Cryptos;

use App\Crypto;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class Ethereum
{
  protected static $api_prefix = 'https://api.ethplorer.io/getAddressInfo/';
  protected static $api_postfix = '?apiKey=';
  protected static $api_key = env('ETH_API_KEY');
  protected static $divisor = 1;
  protected static $balance_route = 'ETH->balance';
  // protected static 'is_child_chain' => false

  public static function getJsonResponse($wallet_address)
  {
    $apiAddress = $static::$api_prefix . $wallet_address . static::$api_postfix . static::$api_key;
    $client = new Client();
    $result = $client->request('GET', $apiAddress);
    $data = json_decode($result->getBody());

    return $data;
  }

  public static function getBalance($wallet_address)
  {
    $data = static::getJsonResponse($wallet_address);
    // convert string route path to actual route path -- this line unique to each crypto
    $obj_path_data = new ObjectPath($data);
    $balance_raw = floatval($obj_path_data->get(static::$balance_route)->getPropertyValue());

    $balance = $balance_raw / static::$divisor;
    return $balance;
  }

  public static function getChildBalance($contract_address, $parent_address)
  {
    // get parent data
    // iterate through "tokens" on parent address
    // for each token check if contract address matches child_address
    // if so get balance
    // return balance
  }

  public static function updateChildBalance($contract_address, $parent_json) // use asset instead of address ? $asset->contract_address ?
  {
    // iterate through "tokens" on parent_json
    // for each token check if contract address matches child_address
    // if so get balance
    // return balance
  }

  public static function instantiate()
  {
    return new static;
  }
}


// test GATB5F7BAC6TC5IDGBVWTP6KV3OD4RXLQCJSI2BTRJAYWU6MZABAZNLJ
// test GB6YPGW5JFMMP2QB2USQ33EUWTXVL4ZT5ITUNCY3YKVWOJPP57CANOF3 <- lots of activity
