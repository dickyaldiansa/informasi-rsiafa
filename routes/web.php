<?php

//login
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/authenticate', 'LoginController@authenticate')->name('authenticate');

//logout
Route::get('/logout', 'LogoutController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {

  //dashboard
  Route::get('/', 'DashboardController@index')->name('/');
  Route::get('/dashboard', 'DashboardController@index');

  //profile
  Route::get('/profile', 'ProfileController@show');
  Route::put('/profile/{id}', 'ProfileController@update');

  //data laporan
  Route::get('/laporan_registrasi', 'LaporanRegistrasiController@index'); 
  Route::get('/laporan_simrs', 'LaporanSimrsController@index');  

});