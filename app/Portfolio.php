<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Asset;
use App\User;

class Portfolio extends Model
{
    protected $fillable = ['name', 'user_id'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function assets()
    {
      return $this->hasMany(Asset::class);
    }

    public function getPercentageChange() {
      $portfolio_assets = $this->assets;

      // if there are no assets, return a 0% change;
      if (count($portfolio_assets) == 0) {
        return 0;
      }

      $portfolio_total_current = 0;
      $portfolio_total_previous = 0;

      foreach($portfolio_assets as $asset) {
        $balance = $asset->wallet_balance;
        $price = $asset->crypto->latest_price;
        $change_24h = $asset->crypto->percent_change_24h;
        $current_value = $balance * $price;
        $previous_price = $current_value / ((100 + $change_24h) / 100);

        $portfolio_total_current += $current_value;
        $portfolio_total_previous += $previous_price;
      }

      if ($portfolio_total_previous == 0) {
        return 0;
      }

      // if the previous 24h portfolio total is 0, return a 0% change;
      $portfolio_pct_change = round((($portfolio_total_current - $portfolio_total_previous) / $portfolio_total_previous) * 100, 2);

      return $portfolio_pct_change;
    }
}
