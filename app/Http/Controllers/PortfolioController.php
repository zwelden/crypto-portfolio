<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use \Auth;

class PortfolioController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth')->except('index');
    }

    public function index ()
    {
      $page_title = 'Portfolios';
      return view('portfolio.index', compact('page_title'));
    }

    public function create()
    {
      return view('portfolios.addPortfolio');
    }

    public function show(Portfolio $portfolio)
    {
      $page_title = 'Portfolio Overview';

      return view('portfolios.show', compact('portfolio', 'page_title'));
    }

    public function store()
    {
      $this->validate(request(), ['name' => 'required']);

      Portfolio::create([
        'name' => request('name'),
        'user_id' => Auth::user()->id
      ]);

      return redirect('/');
    }

    public function delete(Portfolio $portfolio)
    {
      $assets = $portfolio->assets();

      foreach ($assets as $asset) {
        $asset->delete();
      }

      $portfolio->delete();

      return redirect('/');
    }
}
