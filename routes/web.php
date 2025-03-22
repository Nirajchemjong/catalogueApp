<?php

use App\Http\Controllers\CatalogueController;
use Illuminate\Support\Facades\Route;

Route::get("/", [CatalogueController::class, "index"]);
require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';