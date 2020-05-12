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
    Route::get('/', 'muzakkiController@index')->name('index');
    // Muzaki Beras
    Route::get('/beras/tabel', 'muzakkiController@dataTableMuzakkiBeras')->name('beras.tabel');
    Route::post('/beras/store', 'muzakkiController@storeBeras')->name('beras.store');
    Route::get('/beras/create', 'muzakkiController@createBeras')->name('beras.create');
    Route::get('/beras/show/{pesanan}', 'muzakkiController@showBeras')->name('beras.show');
    Route::get('/beras/edit/{pesanan}', 'muzakkiController@editBeras')->name('beras.edit'); 
    Route::put('/beras/update/{pesanan}', 'muzakkiController@updateBeras')->name('beras.update'); 
    Route::delete('/beras/delete/{pesanan}', 'muzakkiController@destroyBeras')->name('beras.destroy');
    
    // Muzaki Uang
    Route::get('/uang/tabel', 'muzakkiController@dataTableMuzakkiUang')->name('uang.tabel');
    Route::post('/uang/store', 'muzakkiController@storeUang')->name('uang.store');
    Route::get('/uang/create', 'muzakkiController@createUang')->name('uang.create');
    Route::get('/uang/show/{pesanan}', 'muzakkiController@showUang')->name('uang.show');
    Route::get('/uang/edit/{pesanan}', 'muzakkiController@editUang')->name('uang.edit'); 
    Route::put('/uang/update/{pesanan}', 'muzakkiController@updateUang')->name('uang.update'); 
    Route::delete('/uang/delete/{pesanan}', 'muzakkiController@destroyUang')->name('uang.destroy');

});

Route::group(['prefix' => 'mustahik', 'as' => 'mustahik.'], function () {    
    Route::get('/', 'mustahikController@index')->name('index');
    // Mustahik
    Route::get('/tabel', 'mustahikController@dataTableMustahik')->name('tabel');
    Route::post('/store', 'mustahikController@store')->name('store');
    Route::get('/create', 'mustahikController@create')->name('create');
    Route::get('/show/{pesanan}', 'mustahikController@show')->name('show');
    Route::get('/edit/{pesanan}', 'mustahikController@edit')->name('edit'); 
    Route::put('/update/{pesanan}', 'mustahikController@update')->name('update'); 
    Route::delete('/delete/{pesanan}', 'mustahikController@destroy')->name('destroy');
    
});

Route::group(['prefix' => 'penghitungan', 'as' => 'penghitungan.'], function () {    
    Route::get('/', 'penghitunganController@index')->name('index');
    // Mustahik
    Route::get('/tabel', 'mustahikController@dataTableMustahik')->name('tabel');
    Route::post('/store', 'mustahikController@store')->name('store');
    Route::get('/create', 'mustahikController@create')->name('create');
    Route::get('/show/{pesanan}', 'mustahikController@show')->name('show');
    Route::get('/edit/{pesanan}', 'mustahikController@edit')->name('edit'); 
    Route::put('/update/{pesanan}', 'mustahikController@update')->name('update'); 
    Route::delete('/delete/{pesanan}', 'mustahikController@destroy')->name('destroy');
    
});