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

Route::group(['middleware' => ['auth','CheckRole:Administrator']],function(){
    //Pasien
    Route::get('/Pasien','PasienController@index');
    Route::resource('/Pendaftaran-pasien','PasienController');
    // Route::post('/Pasien/store','PasienController@store');
    // Route::get('/Pasien/{id}/edit','PasienController@edit');
    // Route::get('/Pasien/{id}/delete', 'PasienController@delete');
    // Route::post('/Pasien/{id}/update','PasienController@update');

    //Obat
    Route::get('/Obat','ObatController@index');
    Route::post('/Obat/create','ObatController@create');
    Route::get('/Obat/{id}/edit','ObatController@edit');
    Route::get('/Obat/{id}/delete', 'ObatController@delete');
    Route::post('/Obat/{id}/update','ObatController@update');

    //Wilayah
    Route::get('/Wilayah','WilayahController@index');
    Route::post('/Wilayah/create','WilayahController@create');
    Route::get('/Wilayah/{id}/edit','WilayahController@edit');
    Route::get('/Wilayah/{id}/delete', 'WilayahController@delete');
    Route::post('/Wilayah/{id}/update','WilayahController@update');

    //User
    Route::get('/User','UserController@index');
    Route::post('/User/create','UserController@create');
    Route::get('/User/{id}/edit','UserController@edit');
    Route::get('/User/{id}/delete', 'UserController@delete');
    Route::post('/User/{id}/update','UserController@update');

    //Pegawai
    Route::get('/Pegawai','PegawaiController@index');
    Route::post('/Pegawai/create','PegawaiController@create');
    Route::get('/Pegawai/{id}/edit','PegawaiController@edit');
    Route::get('/Pegawai/{id}/delete', 'PegawaiController@delete');
    Route::post('/Pegawai/{id}/update','PegawaiController@update');

    //Tindakan
    Route::get('/Tindakan','TindakanController@index');
    Route::post('/Tindakan/create','TindakanController@create');
    Route::get('/Tindakan/{id}/edit','TindakanController@edit');
    Route::get('/Tindakan/{id}/delete', 'TindakanController@delete');
    Route::post('/Tindakan/{id}/update','TindakanController@update');
});

Route::group(['middleware' => ['auth','CheckRole:Dokter']],function(){

});