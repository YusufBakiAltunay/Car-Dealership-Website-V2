<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FuelType extends Model
{
    // Only allowing name to be mass assigned
    protected $fillable = ['name'];

    use HasFactory;

    // One fuelType belongs to many cars
    public function car(): HasMany
    {
        return $this->hasMany(car::class);
    }
}
