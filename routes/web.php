<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/users', 'UserController@showUser')->name('users.show');
Route::get('/users/create', 'UserController@createUser')->name('users.create'); 
Route::post('/users/create', 'UserController@storeUser')->name('users.store'); 
Route::get('/users/edit/{id}', 'UserController@editUser')->name('users.edit'); 
Route::post('/users/update/{id}', 'UserController@updateUser')->name('users.update'); 
Route::get('/users/delete/{id}', 'UserController@destroyUser')->name('users.destroy'); 
