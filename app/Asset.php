<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Portfolio;
use App\Crypto;

class Asset extends Model
{
    protected $fillable = ['portfolio_id', 'crypto_id', 'wallet_balance', 'original_price'];

    public function portfolio()
    {
      return $this->belongsTo(Portfolio::class);
    }

    public function crypto()
    {
      return $this->belongsTo(Crypto::class);
    }
}
