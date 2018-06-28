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


//paging 
Route::get('/{pageName?}', 'PageController@page')->name('page'); 

Route::get('/test', function (){
    return view('test');
});




