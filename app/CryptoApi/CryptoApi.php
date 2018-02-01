<?php

namespace App\CryptoApi;

use App\Crypto;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Helpers\ObjectPath;

class CryptoApi
{
  public $api_prefix;
  public $api_postfix;
  public $divisor;
  public $balance_route;

  public function getBalance($wallet_address) {
    $apiAddress = $this->api_prefix . $wallet_address . $this->api_postfix;
    $client = new Client();
    $result = $client->request('GET', $apiAddress);
    $data = json_decode($result->getBody());
    // convert string route path to actual route path -- this line unique to each crypto
    if ($this->balance_route != "") {
      $obj_path_data = new ObjectPath($data);
      $balance_raw = floatval($obj_path_data->get($this->balance_route)->getPropertyValue());
    } else {
      $balance_raw = floatval($data);
    }

    $balance = $balance_raw / $this->divisor;

    // check for child chains
    // if $this->childchains = true;
    // $children = Assets::where(parentchain == $wallet_address)->get();
    // foreach ($children as $child)
    // $child_balance = child_balance_route

    return $balance;
  }

  public function updateBalance($wallet_address)
  {
    // ...
  }

  public static function instantiate($coin_data)
  {
    $coin = new static;
    $coin->api_prefix = $coin_data['api_prefix'];
    $coin->api_postfix = $coin_data['api_postfix'];
    $coin->divisor = $coin_data['divisor'];
    $coin->balance_route = $coin_data['balance_route'];

    return $coin;
  }
}
