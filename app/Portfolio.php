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
}
