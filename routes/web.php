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
    return view('welcome');
});

Route::get('/newsletters', 'NewsletterController@index');
Route::get('/newsletters/create', 'NewsletterController@create');
Route::get('/newsletters/{id}', 'NewsletterController@show');
Route::post('/newsletters', 'NewsletterController@store');

Route::get('/downloadPDF/{id}','NewsletterController@downloadPDF')->name('pdfShow');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/login', 'Auth\AdminLoginController@showLoginPage')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
