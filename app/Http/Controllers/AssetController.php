<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Portfolio;
use App\Crypto;
use App\Asset;
use App\CryptoApi\CryptoHandler;

class AssetController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function create(Portfolio $portfolio)
    {
      $avaliableCryptos = Crypto::all();
      return view('assets.addAsset', compact('portfolio', 'avaliableCryptos'));
    }

    public function store()
    {
      $this->validate(request(), [
        'portfolio_id' => 'required',
        'crypto_id' => 'required',
        'wallet_balance' => 'required'
      ]);

      if (is_null(request('original_price'))) {
        $original_price = Crypto::where('id', request('crypto_id'))->first()->latest_price;
      } else {
        $original_price = request('original_price');
      }

      Asset::create([
        'portfolio_id' => request('portfolio_id'),
        'crypto_id' => request('crypto_id'),
        'wallet_balance' => request('wallet_balance'),
        'original_price' => $original_price
      ]);

      return redirect('/portfolios/' . request('portfolio_id'));
    }

    public function edit(Asset $asset)
    {
      return view('assets.updateAsset', compact('asset'));
    }

    public function update(Asset $asset)
    {

      if (is_null(request('wallet_balance'))) {
        $wallet_balance = $asset->wallet_balance;
      } else {
        $wallet_ballence = request('wallet_balance');
      }

      if (is_null(request('original_price'))) {
        $original_price = $asset->original_price;
      } else {
        $original_price = request('original_price');
      }

      $asset->update([
        'wallet_balance' => request('wallet_balance'),
        'original_price' => request('original_price')
      ]);

      return redirect('/portfolios/' . $asset->portfolio->id );
    }

    public function delete(Portfolio $portfolio, Asset $asset)
    {
      $asset->delete();

      return redirect('/portfolios/' . $portfolio->id);
    }
}
