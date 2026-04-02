<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'acceleration', 'horsepower', 'top_speed', 'length', 'width', 'height', 'max_load', 'stock', 'car_model_id', 'fuel_type_id'];

    public function carModel(): BelongsTo
    {
        return $this->belongsTo(CarModel::class);
    }

    public function fuelType(): BelongsTo
    {
        return $this->belongsTo(FuelType::class);
    }

    public function latest_price(): HasOne
    {
        return $this->hasOne(priceCar::class)->orderBy('effects', 'desc');
    }

    public function prices(): HasMany
    {
        return $this->hasMany(priceCar::class);
    }
}
