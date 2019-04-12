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
Route::get('/cookies', 'PagesController@cookies')->name('cookies');

Route::get('/dashboard', 'PagesController@dashboard')->name('dashboard')->middleware('auth');
Route::get('/introductiefilm', 'PagesController@introductiefilm')->name('introductiefilm');
Route::get('/cijfersuitderegio', 'PagesController@cijfersuitderegio')->name('cijfersuitderegio');

Route::get('/nieuwescan/start', 'CreateScanController@start')->name('createscan.start');
Route::get('/nieuwesoloscan/naam', 'CreateSingleScanController@title')->name('createsinglescan.title');
Route::post('/nieuwesoloscan/naam', 'CreateSingleScanController@storetitle')->name('createsinglescan.storetitle');
Route::get('/nieuwesoloscan/instantie', 'CreateSingleScanController@instantie')->name('createsinglescan.instantie');
Route::post('/nieuwesoloscan/instantie', 'CreateSingleScanController@storeinstantie')->name('createsinglescan.storeinstantie');
Route::get('/nieuwesoloscan/gemeenten', 'CreateSingleScanController@districts')->name('createsinglescan.districts');
Route::post('/nieuwesoloscan/gemeenten', 'CreateSingleScanController@storedistricts')->name('createsinglescan.storedistricts');
Route::get('/nieuwesoloscan/{scan}/klaar', 'CreateSingleScanController@created')->name('createsinglescan.created');


Route::get('/nieuwegroupsscan/naam', 'CreateGroupScanController@title')->name('creategroupscan.title');
Route::post('/nieuwegroupsscan/naam', 'CreateGroupScanController@storetitle')->name('creategroupscan.storetitle');
Route::get('/nieuwegroupsscan/gemeenten', 'CreateGroupScanController@districts')->name('creategroupscan.districts');
Route::post('/nieuwegroupsscan/gemeenten', 'CreateGroupScanController@storedistricts')->name('creategroupscan.storedistricts');
Route::get('/nieuwegroupsscan/instantie', 'CreateGroupScanController@instantie')->name('creategroupscan.instantie');
Route::post('/nieuwegroupsscan/instantie', 'CreateGroupScanController@storeinstantie')->name('creategroupscan.storeinstantie');
Route::get('/nieuwegroupsscan/datum', 'CreateGroupScanController@datetime')->name('creategroupscan.datetime');
Route::post('/nieuwegroupsscan/datum', 'CreateGroupScanController@storedatetime')->name('creategroupscan.storedatetime');
Route::get('/nieuwegroupsscan/{scan}/klaar', 'CreateGroupScanController@created')->name('creategroupscan.created');

Route::get('/groep/{group}/sluitaan/{code}', 'JoinGroupScanController@addscan')->name('joingroupscan.addscan');	
Route::post('/groep/{group}/sluitaan/{code}', 'JoinGroupScanController@storescan')->name('joingroupscan.storescan');	
Route::get('/groep/{scan}/aangesloten', 'JoinGroupScanController@created')->name('joingroupscan.created');	

Route::post('/groep/{group}/promoot', 'ManageGroupScanController@promoteuser')->name('managegroupscan.promoteuser');
Route::get('/groep/{group}/ontgrendel', 'ManageGroupScanController@unlock')->name('managegroupscan.unlock');



Route::resource('scan', 'ScanController');
Route::get('/scan/{scan}/start', 'ScanPagesController@start')->name('scan.start');
Route::get('/sessie/{scan}/introductiefilm', 'ScanPagesController@introductiefilm')->name('scan.introductiefilm');
Route::get('/sessie/{scan}/kennismaken', 'ScanPagesController@kennismaken')->name('scan.kennismaken');
Route::get('/sessie/{scan}/regioincijfers', 'ScanPagesController@regioincijfers')->name('scan.regioincijfers');
Route::get('/sessie/{scan}/algemeenbeeld', 'ScanPagesController@algemeenbeeld')->name('scan.algemeenbeeld');
Route::get('/sessie/{scan}/algemeenbeeldresultaten', 'ScanPagesController@algemeenbeeldresultaten')->name('scan.algemeenbeeldresultaten');
Route::get('/sessie/{scan}/sessieintro', 'ScanPagesController@sessieintro')->name('scan.sessieintro');
Route::get('/sessie/{scan/overzichtresultaten', 'ScanpagesController@results')->name('scan.results');
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

Route::get('/sessie/{scan}/vergelijking/regios', 'CreateComparisonController@districts')->name('createcomparison.districts');
Route::post('/sessie/{scan}/vergelijking/regios', 'CreateComparisonController@storedistricts')->name('createcomparison.storedistricts');
Route::get('/sessie/{scan}/vergelijking/instantie', 'CreateComparisonController@instantie')->name('createcomparison.instantie');
Route::post('/sessie/{scan}/vergelijking/instantie', 'CreateComparisonController@storeinstantie')->name('createcomparison.storeinstantie');
Route::get('/sessie/{scan}/vergelijking/sessies', 'CreateComparisonController@scans')->name('createcomparison.scans');
Route::post('/sessie/{scan}/vergelijking/sessies', 'CreateComparisonController@storescans')->name('createcomparison.storescans');


Route::resource('group', 'GroupController');
Route::resource('user', 'UserController');
// Route::resource('inventarisatie', 'InventarisatieController');

