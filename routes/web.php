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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/dashboard', ['uses'=>'BackController@getDashboard'])->name('dashboard');
Route::get('/users-and-groups', ['uses'=>'BackController@getUsers'])->name('users');

Route::post('/users-and-groups/{id}/update', ['uses'=>'BackController@updateUser'])->name('user.update');
Route::get('/users-and-groups/{id}/delete', ['uses'=>'BackController@deleteUser'])->name('user.delete');

Route::get('/templates', ['uses'=>'BackController@getTemplates'])->name('templates');
Route::get('/profiles', ['uses'=>'BackController@getProfiles'])->name('profiles');

Route::post('/email/send', ['uses'=>'BackController@postEmail'])->name('email.send');

Route::post('/user/add', ['uses'=>'BackController@postUser'])->name('user.add');

Route::post('/template/add', ['uses'=>'BackController@postTemplate'])->name('template.add');

Route::post('/user/{id}/csv/add', ['uses'=>'BackController@postCSV'])->name('user.csv.add');
Route::post('/user/{id}/csv/delete', ['uses'=>'BackController@deleteCSV'])->name('user.csv.delete');

Route::get('/email/compose', ['uses'=>'BackController@getComposeEmail'])->name('email.compose');
Route::post('/email/profile/add', ['uses'=>'BackController@addEmailProfile'])->name('profile.add');
Route::post('/email/profile/{id}/update', ['uses'=>'BackController@updateEmailProfile'])->name('profile.update');
Route::get('/email/profile/{id}/delete', ['uses'=>'BackController@deleteProfile'])->name('profile.delete');

Route::get('/template/{id}/download', ['uses'=>'BackController@downloadTemplate'])->name('template.download');
Route::get('/template/{id}/delete', ['uses'=>'BackController@deleteTemplate'])->name('template.delete');

Route::get('/user/{id}/view', ['uses'=>'BackController@getUser'])->name('user.view');

Route::post('/email-address/{company_id}/add', ['uses'=>'BackController@addEmailAddress'])->name('email.add');
Route::post('/email-address/{id}/update', ['uses'=>'BackController@updateEmailAddress'])->name('email.edit');
Route::get('/email-address/{id}/delete', ['uses'=>'BackController@deleteEmailAddress'])->name('email.delete');
