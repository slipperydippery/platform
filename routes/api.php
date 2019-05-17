<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResources([
	'answer' 		=> 'API\AnswerController',
	'article' 		=> 'API\ArticleController',	
	'articletype'	=> 'API\ArticletypeController',
	'comparison'	=> 'API\ComparisonController',
	'district'		=> 'API\DistrictController',
	'followup'		=> 'API\FollowupController',
	'group'			=> 'API\GroupController',
	'measure'		=> 'API\MeasureController',
	'scan'			=> 'API\ScanController',
	'message'		=> 'API\MessageController',
]);

Route::post('/articlepostpatch', 'API\ArticleController@postpatch');
Route::post('/joingroup/', 'API\ManageGroupController@joinwithcode');
Route::post('/group/{group}/promote', 'API\ManageGroupController@promoteuser');
Route::post('/scan/{scan}/updatedistricts', 'API\ScanDistrictController@update');
Route::get('/question/{question}/group/{group}/answer', 'API\QuestionGroupAnswerController@index');

// ----------------------------------------------------------------------------
// ----------------------------------------------------------------------------


Route::resource('theme', 'ApiThemeController');
Route::resource('session', 'ApiSessionController');


