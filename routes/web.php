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
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/poll/create/', 'create@index');
//Performs index function as specified in the create controller

Route::post('/poll/create/', 'create@store');
//Stores data from form into database

Route::post('/poll/vote/', 'create@vote');
Route::get('/poll/{id}/','create@load');
Route::get('/poll/{id}/r','create@results');
