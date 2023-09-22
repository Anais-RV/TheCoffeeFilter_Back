<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    public function cities()
    {
        return $this->hasMany(CoffeShop::class);
    }
}
