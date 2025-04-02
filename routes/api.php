<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetsController;

Route::get('/getFeaturedEvents', [AssetsController::class, 'getFeaturedEvents']);
Route::get('/getRecentEvents', [AssetsController::class, 'getRecentEvents']);
Route::get('/getRecentVideos', [AssetsController::class, 'getRecentVideos']);


Route::get('/getEventByAlbumId/{album_id}', [AssetsController::class, 'getEventByAlbumId']);

Route::get('/getPopularEvents', [AssetsController::class, 'getPopularEvents']);
Route::get('/getAllPhotos', [AssetsController::class, 'getAllPhotos']);




Route::get('/getAllEventsSummary', [AssetsController::class, 'getAllEventsSummary']);


