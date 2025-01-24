<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = "stocks";
    protected $fillable = [
        "product_id", "location_id", "quantity"
    ];

    public function product()
    {
        $this->belongsTo(Location::class, "product_id");
    }
    public function location()
    {
        $this->belongsTo(Location::class, "location_id");
    }
}
