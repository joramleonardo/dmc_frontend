<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SddControllerController;


Route::group(['prefix' => 'auth'], function() {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('logout', 'AuthController@logout');
        Route::get('user_profile', 'AuthController@userProfile');
    });
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['middleware' => 'scope:admin,author'], function () {
        
        Route::resource('users', 'UserController');
        Route::get('search-user', 'UserController@searchUser');
        
    });

    // Route::group(['middleware' => 'scope:administrator,employee,user'], function () {
    //     Route::resource('/profile', 'ProfileController');
    // });
});


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::post('register','UserController@register');
Route::post('login','UserController@login');
Route::get('profile','UserController@getAuthenticatedUser');

// USER 
Route::resource('admin', 'AdminController');

// Route::middleware('auth:api')->get('/user', function(Request $request){
//     return $request->user();
// });

//DASHBOARD

Route::post('/set-month', 'DashboardController@setMonth');
Route::post('/set-year', 'DashboardController@setYear');

// Route::get('/set-month/{filter_month}', 'DashboardController@setMonth');
// Route::get('/set-year/{filter_year}', 'DashboardController@setYear');

Route::get('/get-month', 'DashboardController@getMonth');
Route::get('/get-year', 'DashboardController@getYear');

Route::get('/get-material-request-age-bracket-female', 'DashboardController@getMaterialRequest_ageBracket_female');
Route::get('/get-material-request-age-bracket-male', 'DashboardController@getMaterialRequest_ageBracket_male');
Route::get('/get-material-request-client-type-female', 'DashboardController@getMaterialRequest_clientType_female');
Route::get('/get-material-request-client-type-male', 'DashboardController@getMaterialRequest_clientType_male');
Route::get('/get-material-request-client-category-female', 'DashboardController@getMaterialRequest_clientCategory_female');
Route::get('/get-material-request-client-category-male', 'DashboardController@getMaterialRequest_clientCategory_male');
Route::get('/get-material-request-region-female', 'DashboardController@getMaterialRequest_region_female');
Route::get('/get-material-request-region-male', 'DashboardController@getMaterialRequest_region_male');
Route::get('/get-material-request-client-researchInterests', 'DashboardController@getMaterialRequest_researchInterests');

Route::get('get-research-interests', 'DashboardController@getResearchInterests');
Route::get('get-topic-not-found', 'DashboardController@getTopicNotFound');

Route::get('/get-sja-eventTitle-female', 'DashboardController@getSJA_eventTitle_female');
Route::get('/get-sja-eventTitle-male', 'DashboardController@getSJA_eventTitle_male');

Route::get('/get-sja-event-list', 'DashboardController@getSJA_eventList');
Route::get('/get-sja-event-list-noDate', 'DashboardController@getSJA_eventListNoDate');

Route::get('/get-sja-eventData-female', 'DashboardController@getSJA_eventData_female');
Route::get('/get-sja-eventData-male', 'DashboardController@getSJA_eventData_male');

Route::get('/get-starbooks-category-female', 'DashboardController@getSTARBOOKS_category_female');
Route::get('/get-starbooks-category-male', 'DashboardController@getSTARBOOKS_category_male');

Route::get('/get-starbooks-schoolType-female', 'DashboardController@getSTARBOOKS_schoolType_female');
Route::get('/get-starbooks-schoolType-male', 'DashboardController@getSTARBOOKS_schoolType_male');
Route::get('/get-starbooks-logbookList', 'DashboardController@getSTARBOOKS_logbookList');

Route::get('/get-hr-trainings-list', 'DashboardController@getHR_trainingsList');
Route::get('/get-hr-count-participants', 'DashboardController@getHR_countParticipants');
Route::get('/get-hr-count-trainings', 'DashboardController@getHR_countTrainings');



                                /* HEALTH AND TRAINING CATEGORY */

// EMPLOYEE
Route::resource('employees', 'EmployeeController');
Route::get('/employees-data/{id}', 'EmployeeController@loadEmployeeData');
Route::get('/training-data/{id}', 'EmployeeController@loadTrainingData');
Route::get('/employees-training-data/{id}', 'EmployeeController@loadEmployeeto eTraining');
Route::get('/employees-health-data/{id}', 'EmployeeController@loadEmployeeHealth');

Route::get('/get-employees', 'EmployeeController@getEmployess');



// HEALTH
Route::resource('health', 'HealthController');

// TRAINING
Route::resource('training', 'TrainingController');
Route::get('/get-all', 'TrainingController@getAll');
Route::post('addParticipant', 'TrainingParticipantController@addParticipant');
Route::get('/get-trainings', 'TrainingController@getTrainings');
Route::get('/training-participants-data/{id}', 'TrainingController@loadTrainingParticipants');

                                /* PJS CATEGORY */

// RESEARCHER
Route::resource('researchers', 'ResearcherController');
Route::get('/researcher-manuscript-data/{id}', 'ResearcherController@loadEmployeeManuscript');

// MANUSCRIPT
Route::resource('manuscript', 'ManuscriptController');

                                /* SCIENCE JOURNO AKO CATEGORY */

// EVENT
Route::resource('event', 'EventController');
Route::get('/event-speaker-data/{id}', 'EventController@loadEmployeeTraining');
Route::get('/event-participants-data/{id}', 'EventController@loadEmployeeHealth');

// SPEAKER
Route::resource('speaker', 'SpeakerController');

// PARTICIPANTS
Route::resource('participants', 'ParticipantsController');



                                /* LIBRARY CATEGORY */

//EXPERTALK
Route::resource('dostv_expertalk','DOSTvExperTalkController');
Route::resource('dostv_expertalk_guests','DOSTvExperTalkGuestController');
Route::resource('dostv_expertalk_views','DOSTvExperTalkViewsController');


// CLIENT
Route::resource('client', 'ClientController');
Route::get('/client-requestt-data/{id}', 'ClientController@loadClientRequestt');
Route::get('/client-evaluation-data/{id}', 'ClientController@loadClientEvaluation');
Route::get('/client-researchlog-data/{id}', 'ClientController@loadClientResearchLog');

// REQUEST
Route::resource('requestt', 'RequesttController');

// MATERIAL REQUEST
Route::resource('materialrequestt', 'MaterialRequesttController');

Route::resource('ollp', 'OllpController');
Route::get('/ollp-evaluation-data/{id}', 'OllpController@loadOllpEval');
Route::get('/ollp-quiz-data/{id}', 'OllpController@loadOllpQuiz');

Route::resource('ollpeval', 'OllpEvalController');
Route::resource('ollpquiz', 'OllpQuizController');

// EVALUATION
Route::resource('evaluation', 'EvaluationController');

// RESEARCH LOG
Route::resource('researchlog', 'ResearchLogController');

// STARBOOKS
Route::resource('tbllogbook', 'TbllogbookController');




//ADVANCE SEARCH
Route::get('/get-filtered-search', 'ClientController@getFilteredSearch');


Route::get('getAllListDraft', [SddControllerController::class, 'getAllListDraft']);