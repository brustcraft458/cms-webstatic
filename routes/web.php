<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return redirect('/game/the-promise-in-little-world'); // Redirects to a static URL
});

Route::get('/game/{slug?}', [PageController::class, 'show'])->name('page.show');