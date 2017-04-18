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

Route::get( '/','IndexController@index' )->name('index');
Route::get( '/update','IndexController@formCalendar' )->name('form-calendar');
Route::post( '/update','IndexController@addCalendar' )->name('add-calendar');
Route::post( '/delete','IndexController@deleteCalendar' )->name('delete-calendar');