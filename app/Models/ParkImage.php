<?php

namespace App\Models;

use App\Models\Park;
use Illuminate\Database\Eloquent\Model;

class ParkImage extends Model
{
    protected $fillable = [
        "filename",
        "park_id"
    ];

    public function park() {
        return $this->belongsTo(Park::class);
    }
}
