<?php

use App\Http\Controllers\CatalogueController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('welcome');
// })->name('home');

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('dashboard', function () {
//         return Inertia::render('dashboard');
//     })->name('dashboard');
// });

Route::get("/hello", function () {
    return "test one ";
});
Route::get("/", [CatalogueController::class, "index"]);
require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';