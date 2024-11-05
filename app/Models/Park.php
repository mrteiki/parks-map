<?php

namespace App\Models;

use App\Models\ParkImage;
use Illuminate\Support\Str;
use App\Models\ParkActivity;
use Illuminate\Database\Eloquent\Model;

class Park extends Model
{
    protected $fillable = [
        "name",
        "street",
        "city",
        "country",
        "area",
        "opens_at",
        "closes_at",
        "google_maps_url",
        "slug"
    ];

    public function images() {
        return $this->hasMany(ParkImage::class);
    }

    public function activities() {
        return $this->hasMany(ParkActivity::class);
    }

    protected static function booted() {
        static::creating(function ($park) {
            $park->slug = $park->generateUniqueSlug($park->name);
        });
    }

    private function generateUniqueSlug($name) {
        $slug = Str::slug($name);

        $count = Park::where("slug", "like", $slug . "%")->count();

        if ($count) {
            $slug = $slug . "-" . ($count + 1);
        }

        return $slug;
    }
}
