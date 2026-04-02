<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'inventory'];

    public function prices(): HasMany
    {
        return $this->hasMany(PriceProduct::class);
    }

    public function latest_price(): HasOne
    {
        return $this->hasOne(PriceProduct::class)->orderBy('effdate', 'desc');
    }
}

 