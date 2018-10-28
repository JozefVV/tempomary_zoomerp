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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Zakazanie registracie
Auth::routes(['register' => false]);

// Nasledujuce url len pre prihlaseneho users
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/contact', 'HomeController@contact')->name('contact');
