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

Route::get('/',"HomeController@index");
Route::get('/soura/{name}/{id}',"HomeController@suraIndex");
Route::get('/aya/{sura}/{ayaid}/{soraid}',"HomeController@ayaIndex");
Route::get('/tefseer/{sura}/{ayaid}/{name}/{id}',"HomeController@tefseerIndex");
Route::get('/tafaseer/{id}/{name}',"HomeController@tafaseerIndex");
Route::get('/qary/{qary}/{id}',"HomeController@qaryIndex");
Route::get('/sura/{id}',"HomeController@changeSura");
Route::get('/joza/{id}',"HomeController@changeJoza");
Route::get('/page/{id}/{sora}',"HomeController@changePage");
Route::get('/aya/{id}/{sora}',"HomeController@changeAya");
Route::get('/getAyat/{id}',"HomeController@getAyat");
Route::get('/audio/{id}',"HomeController@changeAudio");
Route::get('/setUserData/{page}/{sora}/{aya}/{hezb}/{rob3}/{joza}/{tef}/{qary}',"HomeController@setCookiesData");
Route::get('/tafseer/{id}/{page}',"HomeController@changeTafseer");
Route::get('/getPage/{page}/{aya}/{sora}',"HomeController@getPageAudio");
Route::get('/getAyatPage/{page}/{qary}',"HomeController@getAyatPageAudio");
Route::get('/getAyatSura/{id}',"HomeController@getAyatSuraAudio");
Route::get('/getSuraAudio/{page}/{qary}/{aya}/{sora}',"HomeController@getSuraAudio");



Route::get('/sitemap',"HomeController@SiteMap");
Route::get('robots.txt','HomeController@robot' );
