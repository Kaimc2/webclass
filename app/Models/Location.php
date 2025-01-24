<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasApiTokens;
    protected $table = "locations";
    protected $fillable = [
        "name"
    ];
}
