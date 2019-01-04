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

Route::get('/', function () {
    return redirect('login');
});

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
//Program
Route::get('master','HomeController@master')->middleware('auth');

Route::post('login-home','HomeController@login');

Route::get('logout',function(){
    Auth::logout();
    return redirect('login');
});

Route::resource('sdm','SdmController')->middleware('auth');
Route::resource('master-unit','UnitController')->middleware('auth');
Route::resource('master-user','UserController')->middleware('auth');
Route::resource('master-jenis','JenisBencanaController')->middleware('auth');
Route::resource('master-kebutuhan','JenisKebutuhanController')->middleware('auth');

Route::resource('data-laporan','InstrumenLaporangKejadianController')->middleware('auth');
Route::post('data-laporan-verifikasi/{id}','InstrumenLaporangKejadianController@data_laporan_verifikasi')->middleware('auth');
Route::post('data-laporan-tidak-lengkap/{id}','InstrumenLaporangKejadianController@data_laporan_tidak_lengkap')->middleware('auth');
Route::post('data-laporan-upload-nodin/{id}','InstrumenLaporangKejadianController@data_laporan_upload_nodin')->middleware('auth');
Route::post('data-laporan-upload-sk/{id}','InstrumenLaporangKejadianController@data_laporan_upload_sk')->middleware('auth');
Route::post('data-laporan-disposisi/{id}','InstrumenLaporangKejadianController@data_laporan_disposisi')->middleware('auth');
Route::get('cetak-laporan/{id}','InstrumenLaporangKejadianController@cetak_laporan')->middleware('auth');
Route::resource('data-bantuan-jaminan','InstrumenJHPKBSController')->middleware('auth');
Route::resource('data-bantuan-santuan','InstrumenAssesmentController')->middleware('auth');
Route::resource('data-bantuan-bahan-bangunan','InstrumenAssesmentPemulianController')->middleware('auth');

Route::get('unduh-file/{dir}/{file}','HomeController@unduh');
Route::get('pilih-kab/{idprov}','HomeController@pilih_kab');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
});
Route::get('json_user/{user}/{pass}','JsonController@json_user');
Route::get('json_provinsi','JsonController@json_provinsi');
Route::get('json_kabupaten/{idprov}','JsonController@json_kabupaten');
Route::get('json_kebutuhan','JsonController@json_kebutuhan');
Route::get('json_laporan/{iduser}','JsonController@getlaporan');
Route::get('json_notifikasi/{iduser}','JsonController@json_notifikasi');
 
Route::get('update-koordinat','HomeController@update_koordinat');
Route::get('lihat-dokumen/{dir}/{file}','HomeController@lihat_dokumen');