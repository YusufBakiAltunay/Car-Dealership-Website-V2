<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PriceService extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'effdate', 'garage_service_id'];

    public function priceService(): belongsTo
    {
        return $this->belongsTo(GarageService::class);
    }
}
 