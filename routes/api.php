<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SddControllerController;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\LoginController;


Route::get('getAllListDraft', [SddControllerController::class, 'getAllListDraft']);
Route::get('getAllListSTARBOOKS', [SddControllerController::class, 'getAllListSTARBOOKS']);
Route::get('getAllListDOSTv', [SddControllerController::class, 'getAllListDOSTv']);
Route::get('getAllListHR', [SddControllerController::class, 'getAllListHR']);
Route::get('getAllListLibrary', [SddControllerController::class, 'getAllListLibrary']);
Route::get('getAllListSJA', [SddControllerController::class, 'getAllListSJA']);
Route::get('getAllListPJS', [SddControllerController::class, 'getAllListPJS']);

Route::post('/getAllListDOSTv_guest_female/{expertalk_id}', [SddControllerController::class, 'getAllListDOSTv_guest_female']);
Route::post('/getAllListDOSTv_guest_male/{expertalk_id}', [SddControllerController::class, 'getAllListDOSTv_guest_male']);
Route::get('getAllListDOSTv_views', [SddControllerController::class, 'getAllListDOSTv_views']);


Route::get('getAllListHR_trainings', [SddControllerController::class, 'getAllListHR_trainings']);
Route::post('/getAllListHR_trainings_female/{id}', [SddControllerController::class, 'getAllListHR_trainings_female']);
Route::post('/getAllListHR_trainings_male/{id}', [SddControllerController::class, 'getAllListHR_trainings_male']);

Route::get('getTrainings_withTotalParticipants', [SddControllerController::class, 'getTrainings_withTotalParticipants']);
Route::get('getDOSTv_withTotalParticipants', [SddControllerController::class, 'getDOSTv_withTotalParticipants']);
Route::get('getOLLP_withTotalParticipants', [SddControllerController::class, 'getOLLP_withTotalParticipants']);
Route::get('getMatReq_withTotalParticipants', [SddControllerController::class, 'getMatReq_withTotalParticipants']);
Route::get('getSJA_withTotalParticipants', [SddControllerController::class, 'getSJA_withTotalParticipants']);
Route::get('getSTARBOOKS_withTotalParticipants', [SddControllerController::class, 'getSTARBOOKS_withTotalParticipants']);


Route::get('get_og_expertalk_withTotalParticipants', [SddControllerController::class, 'get_og_expertalk_withTotalParticipants']);
Route::get('get_og_sja_withTotalParticipants', [SddControllerController::class, 'get_og_sja_withTotalParticipants']);
Route::get('get_og_ollp_withTotalParticipants', [SddControllerController::class, 'get_og_ollp_withTotalParticipants']);




Route::get('/test',function(){
    return \Session::all();
});

Route::post('register','UserController@register');
Route::post('login','UserController@login');
Route::get('profile','UserController@getAuthenticatedUser');


Route::post('addRegisteredUsers', [LoginController::class, 'addRegisteredUsers']);
Route::post('validateUser', [LoginController::class, 'validateUser']);
Route::post('getUserData', [LoginController::class, 'getUserData']);



// Route::post('addEventData', 'AssetsController@addEventData');
Route::post('addEventData', [AssetsController::class, 'addEventData']);
Route::post('addComment', [AssetsController::class, 'addComment']);
Route::post('addAlbumTags', [AssetsController::class, 'addAlbumTags']);

Route::post('/addPhotoData', [AssetsController::class, 'addPhotoData']);
Route::post('/deletePhoto', [AssetsController::class, 'deletePhoto']);
Route::post('/replacePhoto', [AssetsController::class, 'replacePhoto']);

Route::post('addPhotoTags', [AssetsController::class, 'addPhotoTags']);
Route::post('addVideoTags', [AssetsController::class, 'addVideoTags']);
Route::post('addVideoData', [AssetsController::class, 'addVideoData']);


Route::post('/getAllListEvents/{author}', [AssetsController::class, 'getAllListEvents']);
Route::post('/getAllListDraft/{author}', [AssetsController::class, 'getAllListDraft']);
Route::post('/getAllListUnderReview/{author}', [AssetsController::class, 'getAllListUnderReview']);
Route::post('/getAllListForReview/{author}', [AssetsController::class, 'getAllListForReview']);
Route::post('/getAllListForRevision/{author}', [AssetsController::class, 'getAllListForRevision']);
Route::post('/getAllListPublished/{author}', [AssetsController::class, 'getAllListPublished']);
Route::post('/getAllListUnpublished/{author}', [AssetsController::class, 'getAllListUnpublished']);

Route::get('getAllListForReview_publisher', [AssetsController::class, 'getAllListForReview_publisher']);
Route::get('getAllListUnderReview_publisher', [AssetsController::class, 'getAllListUnderReview_publisher']);
Route::get('getAllListForRevision_publisher', [AssetsController::class, 'getAllListForRevision_publisher']);
Route::get('getAllListUnpublished_publisher', [AssetsController::class, 'getAllListUnpublished_publisher']);
Route::get('getAllListPublished_publisher', [AssetsController::class, 'getAllListPublished_publisher']);





Route::get('getAllListPhoto', [AssetsController::class, 'getAllListPhoto']);
Route::post('/getEventDetails/{album_id}', [AssetsController::class, 'getEventDetails']);
Route::post('/getListPhoto_selected/{album_id}', [AssetsController::class, 'getListPhoto_selected']);
Route::post('/getPhotoDetails/{id}', [AssetsController::class, 'getPhotoDetails']);
Route::post('/getVideoDetails/{id}', [AssetsController::class, 'getVideoDetails']);

Route::post('/getAlbumID/{id}', [AssetsController::class, 'getAlbumID']);
Route::post('/getListVideo_selected/{album_id}', [AssetsController::class, 'getListVideo_selected']);
Route::post('/getAlbumTags_selected/{album_id}', [AssetsController::class, 'getAlbumTags_selected']);
Route::post('/getPhotoTags_selected/{photo_id}', [AssetsController::class, 'getPhotoTags_selected']);
Route::post('/getVideoTags_selected/{video_id}', [AssetsController::class, 'getVideoTags_selected']);
Route::get('getAllListVideo', [AssetsController::class, 'getAllListVideo']);
Route::post('/getAlbumStatus/{album_id}', [AssetsController::class, 'getAlbumStatus']);
Route::post('/getTrackingLog/{album_id}', [AssetsController::class, 'getTrackingLog']);
Route::post('/getCommentLog/{album_id}', [AssetsController::class, 'getCommentLog']);

Route::get('countAlbumEntry', [AssetsController::class, 'countAlbumEntry']);
Route::post('/countAlbumPhotoEntry/{album_id}', [AssetsController::class, 'countAlbumPhotoEntry']);
Route::post('/countAlbumComment/{album_id}', [AssetsController::class, 'countAlbumComment']);
Route::post('/countAlbumVideoEntry/{album_id}', [AssetsController::class, 'countAlbumVideoEntry']);
Route::post('/checkAlbumTagsExists/{album_id}/{tag_name}', [AssetsController::class, 'checkAlbumTagsExists']);

// Route::post('/countEntry/{date}', 'TicketController@countEntry');


Route::post('/deleteAlbum/{albumID}', [AssetsController::class, 'deleteAlbum']);

Route::post('/updateAlbum/{albumID}', [AssetsController::class, 'updateAlbum']);
Route::post('/updatePhoto/{photo_id}', [AssetsController::class, 'updatePhoto']);
Route::post('/updateVideo/{photo_id}', [AssetsController::class, 'updateVideo']);

Route::post('/updateTrackingLog/{albumID}', [AssetsController::class, 'updateTrackingLog']);
Route::post('/updateTrackingLog_publisher/{albumID}', [AssetsController::class, 'updateTrackingLog_publisher']);


Route::post('addTrackingLog', [AssetsController::class, 'addTrackingLog']);
Route::post('addAlbumStatus_withAuthor', [AssetsController::class, 'addAlbumStatus_withAuthor']);

Route::post('/updateAlbumStatus/{albumID}', [AssetsController::class, 'updateAlbumStatus']);
Route::post('/updateAlbumStatus_withPublisher/{albumID}', [AssetsController::class, 'updateAlbumStatus_withPublisher']);