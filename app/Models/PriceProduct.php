<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PriceProduct extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'effdate', 'product_id'];

    public function product(): belongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
 