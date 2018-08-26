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

//newsletters route
Route::get('admin/newsletters', 'NewsletterController@index');
Route::get('newsletters/create', 'NewsletterController@create');
Route::get('admin/newsletters/{id}', 'NewsletterController@show');
Route::post('newsletters','NewsletterController@store');

//reviewers route
Route::get('admin/reviewers', 'ReviewerController@index');
Route::get('admin/reviewers/create', 'ReviewerController@create');
Route::get('admin/reviewers/{id}', 'ReviewerController@show');
Route::post('admin/reviewers','ReviewerController@store');
Route::get('admin/reviewers/{id}/edit', 'ReviewerController@edit');
Route::delete('admin/reviewers/{id}', 'ReviewerController@destroy');
Route::post('admin/reviewers/{id}', 'ReviewerController@update');

//pdf genarate
Route::get('/downloadPDFNewsletter/{id}','NewsletterController@downloadPDF')->name('pdfShowNewsletter');
Route::get('/downloadPDFJournal/{id}','JournalController@downloadPDF')->name('pdfShowJournal');

//download Doc and Pdf file
Route::get('/PDFJournal/{id}','JournalController@PdfDownload')->name('PDFJournal');
Route::get('/DOCJournal/{id}','JournalController@DocDownload')->name('DOCJournal');

//download newsletters zip
Route::get('/downloadFilesNewsletter/{id}','NewsletterController@downloadZip')->name('downloadFilesNewsletter');

//send email to newsletters submission
//Route::post('/newsletters','NewsletterController@sendEmail');

Auth::routes();

//journals routes
Route::get('/dashboard', 'AuthorJournalController@index');
Route::get('/journals/create', 'AuthorJournalController@create');
Route::get('/journals/{id}', 'AuthorJournalController@show');
Route::post('/journals','AuthorJournalController@store');

//admin routes
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginPage')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin/journals', 'JournalController@index');
Route::get('/admin/journals/{id}', 'JournalController@show');
