<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function getPortfolioValue($portfolio)
  {
    $assets = $portfolio->assets;
    $value = 0;
    if (count($assets) > 0)
    {
      foreach($assets as $asset)
      {
        $value += $asset->wallet_balance * $asset->crypto->latest_price;
      }
    }

    return $value;
  }

  public function index ()
  {
    $user = \Auth::user();
    $portfolios = $user->portfolios;
    $portfolio_data = array();

    if (count($portfolios) > 0)
    {
      foreach ($portfolios as $portfolio)
      {
        $data['name'] = $portfolio->name;
        $data['value'] = $this->getPortfolioValue($portfolio);
        $data['id'] = $portfolio->id;
        $data['percent_change'] = $portfolio->getPercentageChange();
        $data['asset_count'] = count($portfolio->assets);

        $portfolio_data[] = $data;
      }
    }
    // dd($portfolio_data);
    return view('dashboard.index', compact('portfolio_data'));
  }
}
