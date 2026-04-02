<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    // Only allowing brand to be mass assigned
    protected $fillable = ['brand'];

    use HasFactory;

    // One brand has many car models
    public function carModels(): HasMany
    {
        return $this->hasMany(CarModel::class);
    }
}
