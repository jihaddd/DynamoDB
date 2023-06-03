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

Route::get('/', function () {
    return view('welcome');
});
Route::any('/livetable', 'test@fetch_data');
Route::put('/jihad/add_catagory', 'test@add_catagory')->name('add_catagory');
Route::put('/jihad/add_sub', 'test@add_sub_catagory')->name('add_sub');