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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('page.beranda');
// });
Route::get('/', 'berandaController@index')->name('beranda');

Route::group(['prefix' => 'muzakki', 'as' => 'muzakki.'], function () {    
    Route::get('/tabel', 'muzakkiController@dataTableMuzakki')->name('tabel');
    Route::get('/', 'muzakkiController@index')->name('index');
    Route::post('/store', 'muzakkiController@store')->name('store');

});