<?php

use App\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'PagesController@dashboard')->name('dashboard')->middleware('auth');
Route::get('/introductiefilm', 'PagesController@introductiefilm')->name('introductiefilm');

Route::get('/scan/new', 'ScanPagesController@new')->name('scan.new');
Route::get('/scan/createwithgroup', 'ScanPagesController@createwithgroup')->name('scan.createwithgroup');
Route::resource('scan', 'ScanController');
// Route::resource('inventarisatie', 'InventarisatieController');

