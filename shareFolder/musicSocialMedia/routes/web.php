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



//Aurthorization
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

//Default page
//Route::get('/', 'HomeController@index')->name('home');

//paging 
Route::get('/{pageName?}', 'PageController@page')->name('page'); 

//adding to the playlist
//Route::get('/{pageName?}/{tid?}', 'PageController@addToPlayList');





