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

Route::get('/', 'AuthController@showLogin');
Route::post('/', 'AuthController@login');
Route::get('/board', 'BoardController@showList');
Route::get('/board/{id}', 'BoardController@showBoard')->name('board');
Route::get('/board/{id}/card/{idCard}', 'CardController@show');
Route::post('/board/{id}/card/{idCard}', 'CardController@delete');
Route::get('/board/{id}/card/', 'CardController@showNew');
Route::post('/board/{id}/card/', 'CardController@add');
