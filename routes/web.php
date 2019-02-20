<?php

use App\User;

Route::get('/admin/loginasuser/{user}', 'AdminPagesController@loginasuser')->name('loginasuser');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'PagesController@dashboard')->name('dashboard')->middleware('auth');
Route::get('/introductiefilm', 'PagesController@introductiefilm')->name('introductiefilm');

Route::get('/nieuwescan/start', 'CreateScanController@start')->name('createscan.start');
Route::get('/nieuwesoloscan/naam', 'CreateSingleScanController@name')->name('createsinglescan.name');
Route::post('/nieuwesoloscan/naam', 'CreateSingleScanController@storename')->name('createsinglescan.storename');
Route::get('/nieuwesoloscan/instantie', 'CreateSingleScanController@instantie')->name('createsinglescan.instantie');
Route::post('/nieuwesoloscan/instantie', 'CreateSingleScanController@storeinstantie')->name('createsinglescan.storeinstantie');
Route::get('/nieuwesoloscan/gemeentes', 'CreateSingleScanController@districts')->name('createsinglescan.districts');
Route::post('/nieuwesoloscan/regios', 'CreateSingleScanController@storedistricts')->name('createsinglescan.storedistricts');
Route::get('/nieuwesoloscan/{scan}/klaar', 'CreateSingleScanController@created')->name('createsinglescan.created');

Route::get('/nieuwegroupsscan/groep', 'CreateGroupScanController@group')->name('creategroupscan.group');
Route::get('/nieuwegroupsscan/instantie', 'CreateGroupScanController@instantie')->name('creategroupscan.instantie');
Route::get('/nieuwegroupsscan/{scan}/klaar', 'CreateGroupScanController@created')->name('creategroupscan.created');


Route::get('/scan/{scan}/start', 'ScanPagesController@start')->name('scan.start');
Route::resource('scan', 'ScanController');
Route::resource('group', 'GroupController');
// Route::resource('inventarisatie', 'InventarisatieController');

