<?php

use App\Http\Controllers\CatalogueController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [CatalogueController::class, 'index']);
/* Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home'); */