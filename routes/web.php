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

Route::namespace('UserAdmnistration')->group(function () {
    Route::get('/users', 'UserEditorController@index')->name('userAdministration');
    Route::get('/users/list', 'UserEditorController@list')->name('userAdministration.list');
    Route::post('/users/create', 'UserEditorController@create')->name('userAdministration.create');
    Route::post('/users/delete', 'UserEditorController@delete')->name('userAdministration.delete');
    Route::post('/users/disable', 'UserEditorController@disable')->name('userAdministration.disable');
    Route::post('/users/enable', 'UserEditorController@enable')->name('userAdministration.enable');
    Route::post('/users/edit', 'UserEditorController@edit')->name('userAdministration.edit');
    Route::post('/users/role/add', 'UserEditorController@addRole')->name('userAdministration.addRole');
    Route::post('/users/role/remove', 'UserEditorController@removeRole')->name('userAdministration.removeRole');
});

// Route::get('/test', 'UserAdmnistration\AdminEditorController@addForm')->name('test');
