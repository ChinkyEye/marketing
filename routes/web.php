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
    Route::get('/project/active/{id}', 'ProjectController@isActive')->name('project.active');

});
Route::namespace('Staff')->prefix('staff')->name('staff.')->middleware(['staff','auth'])->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    //client
    Route::resource('/client', 'ClientController');
    Route::get('/client/active/{id}', 'ClientController@isActive')->name('client.active');
    Route::get('/client/addinformation/{id}', 'ClientController@addinformation')->name('client.addinformation');
    Route::post('/client/storeinformation', 'ClientController@storeinformation')->name('client.storeinformation');
    //mediator
    Route::resource('/mediator', 'MediatorController');
    Route::get('/mediator/active/{id}', 'MediatorController@isActive')->name('mediator.active');

});

