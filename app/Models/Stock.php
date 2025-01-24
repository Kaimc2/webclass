<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stock extends Model
{
    protected $table = "stocks";
    protected $fillable = [
        "product_id",
        "location_id",
        "quantity"
    ];

    public function product()
    {
        $this->belongsTo(Product::class, "product_id");
    }
    public function location()
    {
        $this->belongsTo(Location::class, "location_id");
    }
}
