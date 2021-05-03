<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




////// Monitor Melihat Daftar Antrean//////
Route::get('/monitor', function () {
    return view('monitor1');
});

Route::get('/monitor/layar', 'PageController@loadnoantrian');


////// Cetak Ticket Antrean//////
Route::get('/antrian', 'PageController@index');

Route::post('/store', 'PageController@store');


///// Halaman Call////
Route::get('/skck', 'CallController@skck');
Route::get('/next/skck', 'PageController@nextskck');
Route::get('/recall/skck', 'PageController@recallskck');

Route::get('/sktlk', 'CallController@sktlk');
Route::get('/next/sktlk', 'PageController@nextsktlk');
Route::get('/recall/sktlk', 'PageController@recallsktlk');


Route::get('/lp', 'CallController@lp');
Route::get('/next/lp', 'PageController@nextlp');
Route::get('/recall/lp', 'PageController@recalllp');

Route::get('/sp2hp', 'CallController@sp2hp');
Route::get('/next/sp2hp', 'PageController@nextsp2hp');
Route::get('/recall/sp2hp', 'PageController@recallsp2hp');


