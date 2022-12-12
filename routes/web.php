<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'VorodController@login');
Route::post('/login', 'VorodController@login_check');
Route::get('/logout', 'VorodController@logout');
Route::post('/ResetPassword', 'VorodController@ResetPassword');
Route::get('/PageResetPassword', 'VorodController@PageResetPassword');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
//--------------------pages
Route::get('/admin/dashboard', 'AdminController@dashboard');
                    ////*****
Route::get('/admin/PageAddShowGharardad', 'AdminController@AddShowGharardad');
Route::post('/admin/PageEditGharardad', 'AdminController@showEditGharardad');
                    ////*****
Route::get('/admin/PageShowSarparastPersenels', 'AdminController@ShowSarparastPersenels');
                    ////*****
Route::get('/admin/PageAlert', 'AdminController@ShowAlert');
Route::post('/admin/PageEditAlert', 'AdminController@showEditAlert');
                    ////*****
Route::Get('/admin/PageUsers', 'AdminController@ShowUsersPage');
Route::POST('/admin/PageEditUser', 'AdminController@ShowEditUsers');
                    ////*****
Route::Get('/admin/PageFirstConfig', 'AdminController@ShowFirstConfig');
Route::Get('/admin/PageAddFirstConfig', 'AdminController@ShowAddFirstConfig');



//----------------------db
Route::Post('/admin/AddGharardad', 'AdminController@AddGharardad');
Route::post('/admin/EditGharardad', 'AdminController@EditGharardad');
                    ////*****
Route::POST('/admin/SetSarparast', 'AdminController@SetSarparast');
                    ////*****
Route::POST('/admin/AddAlert', 'AdminController@AddAlert');
Route::POST('/admin/EditAlert', 'AdminController@EditAlert');
Route::POST('/admin/DeleteAlert', 'AdminController@DeleteAlert');
                    ////*****

Route::POST('/admin/AddUser', 'AdminController@AddUser');
Route::POST('/admin/DeleteUser', 'AdminController@DeleteUser');
Route::POST('/admin/EditUser', 'AdminController@EditUser');
                    ////*****
Route::POST('/admin/SaveFirstConfig', 'AdminController@SaveFirstConfig');
Route::POST('/admin/AddFirstConfig', 'AdminController@AddFirstConfig');
Route::POST('/admin/PageFirstConfig', 'AdminController@SelectFirstConfig');

Route::POST('/admin/PassCheck', 'AdminController@PassCheck');

/*-------------end admin---------------*/








/*
|--------------------------------------------------------------------------
| sarparast
|--------------------------------------------------------------------------
*/

//pages
Route::get('/sarparast/dashboard', 'SarparastController@dashboard');
Route::get('/sarparast/PageShowMyEvent', 'SarparastController@ShowMyEvent');

Route::get('/sarparast/PageShowListPersenel', 'SarparastController@ShowListPersenel');
Route::POST('/sarparast/PageShowListPersenel2', 'SarparastController@ShowListPersenel2');

Route::get('/sarparast/PageListPersenelShercati', 'SarparastController@PageListPersenelShercati');
Route::POST('/sarparast/PageListPersenelShercati2', 'SarparastController@PageListPersenelShercati2');

Route::get('/sarparast/PageListPersenelErja', 'SarparastController@PageListPersenelErja');
Route::POST('/sarparast/PageListPersenelErja2', 'SarparastController@PageListPersenelErja2');

Route::get('/sarparast/PageHozoorMahPersenel', 'SarparastController@PageHozoorMahPersenel');
Route::POST('/sarparast/PageHozoorMahPersenel2', 'SarparastController@PageHozoorMahPersenel2');

//db
Route::POST('/sarparast/addMorakhasiRoozane', 'SarparastController@addMorakhasiRoozane');
Route::POST('/sarparast/addMorakhasiSaati', 'SarparastController@addMorakhasiSaati');
Route::POST('/sarparast/addٍٍEzafeKarSherkati', 'SarparastController@addٍٍEzafeKarSherkati');
Route::POST('/sarparast/addٍٍEzafeKarٍerjaei', 'SarparastController@addٍٍEzafeKarٍerjaei');
Route::POST('/sarparast/SaveHozoorRozane', 'SarparastController@SaveHozoorRozane');
Route::POST('/sarparast/addٍٍHoozorMahaneSonati', 'SarparastController@addٍٍHoozorMahaneSonati');



/*-------------end sarparast---------------*/










/*
|--------------------------------------------------------------------------
| karmand
|--------------------------------------------------------------------------
*/
//-----------------------page

Route::get('/karmand/dashboard', 'KarmandController@dashboard');
Route::get('/karmand/PageAddPersenel', 'KarmandController@PageAddPersenel');
Route::get('/karmand/PageListPersenel', 'KarmandController@PageListPersenel');
Route::get('/karmand/PageListPersenelHesab', 'KarmandController@PageListPersenelHesab');
Route::get('/karmand/PageCheck', 'KarmandController@PageCheck');
Route::Post('/karmand/PageEditCheck', 'KarmandController@PageEditCheck');
Route::Post('/karmand/PageEditPersenel', 'KarmandController@PageEditPersenel');
Route::Get('/karmand/PageListPay', 'KarmandController@PageListPay');

Route::Get('/karmand/pagelisthozorgheyab', 'KarmandController@listhozorgheyab');
Route::POST('/karmand/pagelisthozorgheyab2', 'KarmandController@listhozorgheyab2');
Route::POST('/karmand/Pagelisthogogh', 'KarmandController@Pagelisthogogh');
Route::POST('/karmand/ShowPageTark', 'KarmandController@ShowPageTark');
Route::POST('/karmand/PageShowTasv', 'KarmandController@PageShowTasv');

Route::get('/karmand/Pagefish', 'KarmandController@Pagefish');

Route::get('/karmand/PagePadash', 'KarmandController@PagePadash');

Route::get('/karmand/Report_taahod', 'KarmandController@Report_taahod');

//----------------------db

// Persenel
Route::POST('/karmand/AddPersenel', 'KarmandController@AddPersenel');
Route::POST('/karmand/DeletePersenel', 'KarmandController@DeletePersenel');
Route::Post('/karmand/EditPersenel', 'KarmandController@EditPersenel');

//  Check
Route::POST('/karmand/AddCheck', 'KarmandController@AddCheck');
Route::POST('/karmand/PassCheck', 'KarmandController@PassCheck');
Route::POST('/karmand/DeleteCheck', 'KarmandController@DeleteCheck');
Route::Post('/karmand/EditCheck', 'KarmandController@EditCheck');
//  mosaedeh
Route::Post('/karmand/AddMosaedeh', 'KarmandController@AddMosaedeh');
Route::Post('/karmand/PageListpayData', 'KarmandController@PageListpayData');

Route::Post('/karmand/DeleteMosaedeh', 'KarmandController@DeleteMosaedeh');
Route::Post('/karmand/GetListpayDataFile', 'KarmandController@GetListpayDataFile');
//  hogogh
Route::Post('/karmand/pardakh_H', 'KarmandController@pardakh_H');
Route::Post('/karmand/DeleteHoghogh', 'KarmandController@DeleteHoghogh');
Route::Post('/karmand/PageListpayData2', 'KarmandController@PageListpayData2');
Route::Post('/karmand/GetListpayDataFile2', 'KarmandController@GetListpayDataFile2');
//  print report
Route::Post('/karmand/showreport', 'KarmandController@showreport');
Route::Get('/karmand/getjespersenel/{id}', 'KarmandController@getjespersenel');

//tark tasviei
Route::Post('/karmand/SetTark', 'KarmandController@SetTark');

//padash
Route::Post('/karmand/addpadashandjarime', 'KarmandController@addpadashandjarime');
Route::Post('/karmand/deletepaja', 'KarmandController@deletepaja');



/*-------------end karmand---------------*/
