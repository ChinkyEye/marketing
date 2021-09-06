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

Auth::routes();

Route::namespace('Backend')->prefix('home')->name('admin.')->middleware(['admin','auth'])->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/project', 'ProjectController');

});
Route::namespace('Staff')->prefix('staff')->name('staff.')->middleware(['staff','auth'])->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/client', 'ClientController');
    Route::get('/client/active/{id}', 'ClientController@isActive')->name('client.active');

});

