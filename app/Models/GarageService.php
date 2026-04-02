<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GarageService extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function prices(): HasMany
    {
        return $this->hasMany(PriceService::class);
    }

    public function latest_price(): HasOne
    {
        return $this->hasOne(PriceService::class)->orderBy('effdate', 'desc');
    }
}
 