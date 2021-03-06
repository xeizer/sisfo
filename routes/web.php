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
    return view('layouts.tema1.app');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('profil')->middleware('auth')->name('profil.')->group(function () {
    Route::get('/', 'ProfilController@index')->name('index');
    Route::put('/update', 'ProfilController@update')->name('update');
    Route::get('/setting', 'ProfilController@setting')->name('setting');
});
Route::prefix('jurusan')->middleware('role:su|admin')->name('jurusan.')->group(function () {
    Route::get('/', 'JurusanController@index')->name('index');
});
Route::prefix('guru')->middleware('role:su|admin')->name('guru.')->group(function () {
    Route::get('/api/index', 'GuruController@api-index')->name('api.index');
    Route::get('/', 'GuruController@index')->name('index');
});
