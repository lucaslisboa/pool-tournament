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


//Grupo de rotas para quem está logado
Route::middleware(['auth'])->prefix('admin')->namespace('Admin')->group(function() {

    Route::resource('players','PlayerController');
    Route::resource('games','GameController');

});
