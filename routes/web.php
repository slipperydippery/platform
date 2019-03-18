<?php

use App\User;

Route::get('/admin/loginasuser/{user}', 'AdminPagesController@loginasuser')->name('loginasuser');

Route::get('/', function () {
    return view('pages.dashboard');
});

Auth::routes(['verify' => true]);

// Two Factor Authentication
Route::get('2fa', 'TwoFactorController@showTwoFactorForm');
Route::post('2fa', 'TwoFactorController@verifyTwoFactor');


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

Route::get('/nieuwegroupsscan/naam', 'CreateGroupScanController@title')->name('creategroupscan.title');
Route::post('/nieuwegroupsscan/naam', 'CreateGroupScanController@storetitle')->name('creategroupscan.storetitle');
Route::get('/nieuwegroupsscan/gemeenten', 'CreateGroupScanController@districts')->name('creategroupscan.districts');
Route::post('/nieuwegroupsscan/gemeenten', 'CreateGroupScanController@storedistricts')->name('creategroupscan.storedistricts');
Route::get('/nieuwegroupsscan/instantie', 'CreateGroupScanController@instantie')->name('creategroupscan.instantie');
Route::post('/nieuwegroupsscan/instantie', 'CreateGroupScanController@storeinstantie')->name('creategroupscan.storeinstantie');
Route::get('/nieuwegroupsscan/datetime', 'CreateGroupScanController@datetime')->name('creategroupscan.datetime');
Route::post('/nieuwegroupsscan/datetime', 'CreateGroupScanController@storedatetime')->name('creategroupscan.storedatetime');
Route::get('/nieuwegroupsscan/{scan}/klaar', 'CreateGroupScanController@created')->name('creategroupscan.created');



Route::resource('scan', 'ScanController');
Route::get('/scan/{scan}/start', 'ScanPagesController@start')->name('scan.start');
Route::get('/scan/{scan}/introductiefilm', 'ScanPagesController@introductiefilm')->name('scan.introductiefilm');
Route::get('/scan/{scan}/kennismaken', 'ScanPagesController@kennismaken')->name('scan.kennismaken');
Route::get('/sessie/{scan}/regioincijfers', 'ScanPagesController@regioincijfers')->name('scan.regioincijfers');
Route::get('/sessie/{scan}/algemeenbeeld', 'ScanPagesController@algemeenbeeld')->name('scan.algemeenbeeld');
Route::get('/sessie/{scan}/algemeenbeeldresultaten', 'ScanPagesController@algemeenbeeldresultaten')->name('scan.algemeenbeeldresultaten');
Route::get('/sessie/{scan}/sessieintro', 'ScanPagesController@sessieintro')->name('scan.sessieintro');
Route::post('/api/scan/{scan}', 'ApiScanController@update');
Route::get('/sessie/{scan}/thema/{theme}/introductie', 'ScanQuestionController@intro')->name('scanquestions.intro');
Route::get('/sessie/{scan}/thema/{theme}/vraag/{question}', 'ScanQuestionController@show')->name('scanquestions.show');
Route::get('/sessie/{scan}/thema/{theme}/resultaten', 'ScanQuestionController@results')->name('scanquestions.results');
Route::get('/sessie/{scan}/thema/{theme}/acties', 'ScanQuestionController@measures')->name('scanquestions.measures');
Route::get('/sessie/{scan}/thema/{theme}/actiesuitwerken', 'ScanQuestionController@bigmeasures')->name('scanquestions.bigmeasures');
Route::get('/sessie/{scan}/vervolgafspraak', 'ScanQuestionController@followup')->name('scanquestions.followup');
Route::post('/scan/{scan}/commitdatetime', 'ScanQuestionController@commitdatetime')->name('scanquestions.commitdatetime');
Route::get('/sessie/{scan}/afgerond', 'ScanQuestionController@complete')->name('scanquestions.complete');
Route::get('/sessie/{scan}/markcomplete', 'ScanQuestionController@markcomplete')->name('scanquestions.markcomplete');
Route::get('/sessie/{scan}/resultaten', 'ScanPagesController@results')->name('scan.results');
Route::get('/sessie/{scan}/actiepunten', 'ScanPagesController@measures')->name('scan.measures');


Route::resource('group', 'GroupController');
// Route::resource('inventarisatie', 'InventarisatieController');

