<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeeShop extends Model
{
    use HasFactory;

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
