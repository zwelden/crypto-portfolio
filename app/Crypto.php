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
      'current_rank'
    ];

    public function assets()
    {
      return $this->hasMany(Asset::class);
    }
}
