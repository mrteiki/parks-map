<?php

use App\Http\Controllers\ParkController;
use Illuminate\Support\Facades\Route;

Route::controller(ParkController::class)
    ->prefix("park")
    ->name("park.")
    ->group(function () {
        Route::get("/", "index")->name("index");
        Route::get("/{slug}", "getBySlug")->name("details");
        Route::get("/add", "create")->name("add");
        Route::post("/", "store")->name("store");
    });