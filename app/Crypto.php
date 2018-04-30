<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crypto extends Model
{
    protected $fillable = [
      'name',
      'cmc_symbol',
      'cc_api_symbol',
      'category',
      'latest_price',
      'current_rank',
      'percent_change_1h',
      'percent_change_24h',
      'percent_change_7d'
    ];

    public function assets()
    {
      return $this->hasMany(Asset::class);
    }
}
