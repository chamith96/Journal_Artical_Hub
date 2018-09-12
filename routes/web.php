<?php
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

//newsletters route
Route::get('admin/newsletters', 'NewsletterController@index');
Route::get('newsletters/create', 'NewsletterController@create');
Route::get('admin/newsletters/{id}', 'NewsletterController@show');
Route::post('newsletters','NewsletterController@store');

//pdf genarate
Route::get('/downloadPDFNewsletter/{id}','NewsletterController@downloadPDF')->name('pdfShowNewsletter');
Route::get('/downloadPDFJournal/{id}','JournalController@downloadPDF')->name('pdfShowJournal');

//download newsletters and journal zip
Route::get('/downloadFilesNewsletter/{id}','NewsletterController@downloadZip')->name('downloadFilesNewsletter');
Route::get('/downloadFilesJournal/{id}','JournalController@downloadZip')->name('downloadFilesJournal');

//journals routes
Route::get('/dashboard', 'AuthorJournalController@index');
Route::get('/journals/create', 'AuthorJournalController@create');
Route::get('/journals/{id}', 'AuthorJournalController@show');
Route::post('/journals','AuthorJournalController@store');
Route::get('/admin/journals/{id}/email', 'JournalController@emailPage');
Route::post('/admin/journals/email', 'JournalController@sendEmail');
Route::get('admin/journals/{id}/assigns', 'JournalController@indexAssign');
Route::post('/admin/journals/{id}/assigns', 'JournalController@storeAssign');

//reviewers route
Route::get('admin/reviewers', 'ReviewerController@index');
Route::get('admin/reviewers/create', 'ReviewerController@create');
Route::get('admin/reviewers/{id}', 'ReviewerController@show');
Route::post('admin/reviewers','ReviewerController@store');
Route::get('admin/reviewers/{id}/edit', 'ReviewerController@edit');
Route::delete('admin/reviewers/{id}', 'ReviewerController@destroy');
Route::post('admin/reviewers/{id}', 'ReviewerController@update');
Route::get('/admin/reviewers/email/{id}', 'ReviewerController@showEmail');
Route::post('/admin/email/reviewers', 'ReviewerController@sendEmail');

//user routes
Route::get('/admin/users', 'UserController@index');
Route::get('/admin/users/email/{id}', 'UserController@showEmail');
Route::post('admin/email/users', 'UserController@sendEmail');

//email route
Route::get('/admin/emails', 'EmailController@index');
Route::get('/admin/emails/user', 'EmailController@indexUser');
Route::get('/admin/emails/reviewer', 'EmailController@indexReviewer');
Route::get('/admin/emails/user', 'EmailController@showUser');
Route::get('/admin/emails/reviewer', 'EmailController@showReviewer');
Route::get('/admin/emails/user/{id}', 'EmailController@userContent');
Route::get('/admin/emails/reviewer/{id}', 'EmailController@reviewerContent');

//admin routes
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginPage')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin/journals', 'JournalController@index');
Route::get('/admin/journals/{id}', 'JournalController@show');

//assign route
Route::get('/admin/assigns', 'AssignController@index');
Route::get('/admin/assigns', 'AssignController@show');
