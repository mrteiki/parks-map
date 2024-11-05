<?php

namespace App\Models;

use App\Models\Park;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Model;

class ParkActivity extends Model
{
    protected $fillable = [
        "park_id",
        "activity_id"
    ];

    public function park() {
        return $this->belongsTo(Park::class);
    }

    public function activity() {
        return $this->belongsTo(Activity::class);
    }
}
