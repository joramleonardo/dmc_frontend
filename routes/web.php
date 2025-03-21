<?php

use Illuminate\Support\Facades\Route;

// Serve Vue SPA for all unknown routes (excluding API)
Route::get('/{any}', function () {
    return view('welcome'); // ✅ Vue will be loaded inside welcome.blade.php
})->where('any', '.*');
