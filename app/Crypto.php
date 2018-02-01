<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crypto extends Model
{
    protected $fillable = [
      'name',
      'symbol',
      'category',
      'latest_price',
      'current_rank'
    ];
}
