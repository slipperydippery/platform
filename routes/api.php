<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('answer', 'ApiAnswerController');
Route::resource('theme', 'ApiThemeController');
Route::resource('group', 'ApiGroupController');
Route::resource('scan', 'ApiScanController');
Route::resource('measure', 'ApiMeasureController');
Route::resource('followup', 'ApiFollowupController');

Route::get('/scan/{scan}/question/{question}/getanswers', 'ApiScanQuestionController@getanswers');

Route::get('/group/{group}/scan', 'ApiGroupScanController@index');

Route::get('skillz', function () {
	return['Hello', 'this', 'is', 'an', 'array'];
})->middleware();

Route::get('skills', function () {
	return['Hello', 'this', 'is', 'an', 'array'];
})->middleware('auth:api');