<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('parks', function (Blueprint $table) {
            $table->id();
            $table->string("name", 100)->unique();
            $table->string("street", 100);
            $table->string("city", 50);
            $table->string("country", 50);
            $table->integer("area");
            $table->time("opens_at")->nullable();
            $table->time("closes_at")->nullable();
            $table->string("google_maps_url");
            $table->string("slug")->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parks');
    }
};
