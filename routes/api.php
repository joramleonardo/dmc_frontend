<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetsController;

Route::get('/getFeaturedEvents', [AssetsController::class, 'getFeaturedEvents']);
Route::get('/getRecentEvents', [AssetsController::class, 'getRecentEvents']);
Route::get('/getRecentVideos', [AssetsController::class, 'getRecentVideos']);
Route::get('/getEventByAlbumId/{album_id}', [AssetsController::class, 'getEventByAlbumId']);
Route::get('/getPopularEvents', [AssetsController::class, 'getPopularEvents']);
Route::get('/getPopularEvents_Footer', [AssetsController::class, 'getPopularEvents_Footer']);
Route::get('/getAllPhotos', [AssetsController::class, 'getAllPhotos']);
Route::get('/getAllEventsSummary', [AssetsController::class, 'getAllEventsSummary']);
Route::get('/getTagsByAlbumId/{album_id}', [AssetsController::class, 'getAllTagsByAlbumId']);



// Route::get('/getEventsByTag/{tag}', [AssetsController::class, 'getEventsByTag']);
Route::get('/getEventsByTag', [AssetsController::class, 'getEventsByTag']);


Route::get('/getRelatedEvents/{album_id}', [AssetsController::class, 'getRelatedEvents']);


Route::get('/upcoming-events', [AssetsController::class, 'getUpcomingEvents']);
Route::get('/getUpcomingEventById/{id}', [AssetsController::class, 'getUpcomingEventById']);


