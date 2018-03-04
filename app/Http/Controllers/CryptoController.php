<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Crypto;

class CryptoController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    public function index ()
    {
      $cryptos = Crypto::orderBy('current_rank')->get();
      return view('cryptos.index', compact('cryptos'));
    }

    public function create ()
    {
      return view('cryptos.addCrypto');
    }

    public function edit (Crypto $crypto)
    {
      return view('cryptos.edit', compact('crypto'));
    }

    public function update (Crypto $crypto)
    {
      if (request('name')) {
        $crypto->name = request('name');
      }

      if (request('symbol')) {
        $crypto->symbol = request('symbol');
      }

      if (request('category')) {
        $crypto->category = request('category');
      }

      $crypto->save();

      return redirect('/cryptos');
    }

    public function store ()
    {
      $this->validate(request(), ['name' => 'required', 'symbol' => 'required']);

      Crypto::create([
        'name' => request('name'),
        'symbol' => request('symbol'),
        'category' => request('category')
      ]);

      return redirect('/cryptos');
    }
}