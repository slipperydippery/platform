<?php

use App\User;

// Auth routes
Auth::routes(['verify' => true]);
Route::get('/wijzigwachtwoord','Auth\ChangePasswordController@show')->name('changepassword.show');
Route::post('/wijzigwachtwoord','Auth\ChangePasswordController@update')->name('changepassword.update');

// Admin routes
Route::get('/admin/loginasuser/{user_nr}', 'AdminPagesController@loginasuser')->name('loginasuser');
Route::get('/overzichtresultaten', 'AdminPagesController@globalresults')->name('globalresults');
Route::resource('article', 'ArticleController');
Route::resource('articletype', 'ArticletypeController');

// Info & website pages
Route::get('/', 'PagesController@dashboard')->name('dashboard');
Route::get('/cookies', 'PagesController@cookies')->name('cookies');
Route::get('/introductiefilm', 'PagesController@introductiefilm')->name('introductiefilm');
Route::get('/cijfersuitderegio', 'PagesController@cijfersuitderegio')->name('cijfersuitderegio');
Route::get('/contact', 'PagesController@contact')->name('contact');

/**
 *  Create Scans
 */

// New Single Scan
Route::get('/nieuwesoloscan/naam', 'CreateSingleScanController@title')->name('createsinglescan.title');
Route::post('/nieuwesoloscan/naam', 'CreateSingleScanController@storetitle')->name('createsinglescan.storetitle');
Route::get('/nieuwesoloscan/instantie', 'CreateSingleScanController@instantie')->name('createsinglescan.instantie');
Route::post('/nieuwesoloscan/instantie', 'CreateSingleScanController@storeinstantie')->name('createsinglescan.storeinstantie');
Route::get('/nieuwesoloscan/gemeenten', 'CreateSingleScanController@districts')->name('createsinglescan.districts');
Route::post('/nieuwesoloscan/gemeenten', 'CreateSingleScanController@storedistricts')->name('createsinglescan.storedistricts');
Route::get('/nieuwesoloscan/{scan}/klaar', 'CreateSingleScanController@created')->name('createsinglescan.created');

// New Group Scan
Route::get('/nieuwegroupsscan/naam', 'CreateGroupScanController@title')->name('creategroupscan.title');
Route::post('/nieuwegroupsscan/naam', 'CreateGroupScanController@storetitle')->name('creategroupscan.storetitle');
Route::get('/nieuwegroupsscan/gemeenten', 'CreateGroupScanController@districts')->name('creategroupscan.districts');
Route::post('/nieuwegroupsscan/gemeenten', 'CreateGroupScanController@storedistricts')->name('creategroupscan.storedistricts');
Route::get('/nieuwegroupsscan/instantie', 'CreateGroupScanController@instantie')->name('creategroupscan.instantie');
Route::post('/nieuwegroupsscan/instantie', 'CreateGroupScanController@storeinstantie')->name('creategroupscan.storeinstantie');
Route::get('/nieuwegroupsscan/datum', 'CreateGroupScanController@datetime')->name('creategroupscan.datetime');
Route::post('/nieuwegroupsscan/datum', 'CreateGroupScanController@storedatetime')->name('creategroupscan.storedatetime');
Route::get('/nieuwegroupsscan/{scan}/klaar', 'CreateGroupScanController@created')->name('creategroupscan.created');

// Netwerkpartners
Route::get('/group/{group}/netwerkanalyse', 'NetwerkanalyseController@create');
Route::resource('netwerkanalyse', 'NetwerkanalyseController');

// Join Scan
Route::get('/groep/sluitaanmetcode', 'JoinGroupScanController@entercode')->name('joingroupscan.entercode');
Route::post('/group/sluitaanmetcode', 'JoinGroupScanController@storecode')->name('joingroupscan.storecode');
Route::get('/groep/{group}/sluitaan/{code}', 'JoinGroupScanController@addscan')->name('joingroupscan.addscan');
Route::post('/groep/{group}/sluitaan/{code}', 'JoinGroupScanController@storescan')->name('joingroupscan.storescan');
Route::get('/groep/{scan}/aangesloten', 'JoinGroupScanController@created')->name('joingroupscan.created');

// Manage Scan & Group
Route::get('/groep/{group}/ontgrendel', 'ManageGroupScanController@unlock')->name('managegroupscan.unlock');
Route::resource('scan', 'ScanController');

// Scan and pages
Route::get('/scan/{scan}/start', 'ScanPagesController@start')->name('scan.start');
Route::get('/sessie/{scan}/introductiefilm', 'ScanPagesController@introductiefilm')->name('scan.introductiefilm');
Route::get('/sessie/{scan}/kennismaken', 'ScanPagesController@kennismaken')->name('scan.kennismaken');
Route::get('/sessie/{scan}/regioincijfers', 'ScanPagesController@regioincijfers')->name('scan.regioincijfers');
Route::get('/sessie/{scan}/algemeenbeeld', 'ScanPagesController@algemeenbeeld')->name('scan.algemeenbeeld');
Route::get('/sessie/{scan}/algemeenbeeldresultaten', 'ScanPagesController@algemeenbeeldresultaten')->name('scan.algemeenbeeldresultaten');
Route::get('/sessie/{scan}/sessieintro', 'ScanPagesController@sessieintro')->name('scan.sessieintro');
Route::get('/sessie/{scan/overzichtresultaten', 'ScanPagesController@results')->name('scan.results');
Route::get('/sessie/{scan}/thema/{theme}/introductie', 'ScanQuestionController@intro')->name('scanquestions.intro');
Route::get('/sessie/{scan}/thema/{theme}/vraag/{question}', 'ScanQuestionController@show')->name('scanquestions.show');
Route::get('/sessie/{scan}/thema/{theme}/resultaten', 'ScanQuestionController@results')->name('scanquestions.results');
Route::get('/sessie/{scan}/thema/{theme}/acties', 'ScanQuestionController@measures')->name('scanquestions.measures');
Route::get('/sessie/{scan}/actiesuitwerkenintro', 'ScanQuestionController@bigmeasuresintro')->name('scanquestions.bigmeasuresintro');
Route::get('/sessie/{scan}/thema/{theme}/actiesuitwerken', 'ScanQuestionController@bigmeasures')->name('scanquestions.bigmeasures');
Route::get('/sessie/{scan}/vervolgafspraak', 'ScanQuestionController@followup')->name('scanquestions.followup');
Route::post('/scan/{scan}/commitdatetime', 'ScanQuestionController@commitdatetime')->name('scanquestions.commitdatetime');
Route::get('/sessie/{scan}/afgerond', 'ScanQuestionController@complete')->name('scanquestions.complete');
Route::get('/sessie/{scan}/markcomplete', 'ScanQuestionController@markcomplete')->name('scanquestions.markcomplete');
Route::get('/sessie/{scan}/resultaten', 'ScanPagesController@results')->name('scan.results');
Route::get('/sessie/{scan}/verbeterpunten', 'ScanPagesController@measures')->name('scan.measures');
Route::get('/sessie/{scan}/mailverbeterpunten', 'ScanPagesController@mailmeasures')->name('scan.mailmeasures');

// Comparison
Route::get('/sessie/{scan}/vergelijking/regios', 'CreateComparisonController@districts')->name('createcomparison.districts');
Route::post('/sessie/{scan}/vergelijking/regios', 'CreateComparisonController@storedistricts')->name('createcomparison.storedistricts');
Route::get('/sessie/{scan}/vergelijking/instantie', 'CreateComparisonController@instantie')->name('createcomparison.instantie');
Route::post('/sessie/{scan}/vergelijking/instantie', 'CreateComparisonController@storeinstantie')->name('createcomparison.storeinstantie');
Route::get('/sessie/{scan}/vergelijking/sessies', 'CreateComparisonController@scans')->name('createcomparison.scans');
Route::post('/sessie/{scan}/vergelijking/sessies', 'CreateComparisonController@storescans')->name('createcomparison.storescans');

// Resources
Route::resource('group', 'GroupController');
Route::resource('user', 'UserController');
Route::resource('comparison', 'ComparisonController');

