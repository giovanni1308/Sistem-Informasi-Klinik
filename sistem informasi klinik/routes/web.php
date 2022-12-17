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

Route::get('/',function(){
    return redirect('/login');
});

Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');
Route::get('/dashboard','DashboardController@index');

Route::group(['middleware' => ['auth','CheckRole:admin']],function(){
    //Pendaftaran Pasien
    Route::get('/Pasien','PasienController@index');
    Route::post('/Pasien/create','PasienController@create');
    Route::get('/Pasien/{id}/edit','PasienController@edit');
    Route::get('/Pasien/{id}/delete', 'PasienController@delete');
    Route::post('/Pasien/{id}/update','PasienController@update');

    //Obat
    Route::get('/Obat','ObatController@index');
    Route::post('/Obat/create','ObatController@create');
    Route::get('/Obat/{id}/edit','ObatController@edit');
    Route::get('/Obat/{id}/delete', 'ObatController@delete');
    Route::post('/Obat/{id}/update','ObatController@update');
});