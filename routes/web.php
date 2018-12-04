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
    //space for some landing/info page
    //now just redirect right into dashboard if logged in
    return redirect('/dashboard');
});

// Zakazanie registracie
Auth::routes(['register' => false]);

// Nasledujuce url len pre prihlaseneho users
Route::get('/dashboard', 'HomeController@index')->name('home');

Route::get('/profile/{id?}', 'HomeController@profile')->name('profile');


Route::namespace('UserAdmnistration')->group(function () {
    Route::get('/users', 'UserEditorController@index')->name('userAdministration');
    Route::get('/users/register', 'UserEditorController@registerView')->name('userAdministration.register');

    Route::get('/users/list', 'UserEditorController@list')->name('userAdministration.list');
    Route::post('/users/create', 'UserEditorController@create')->name('userAdministration.create');
    Route::post('/users/delete', 'UserEditorController@delete')->name('userAdministration.delete');
    Route::post('/users/disable', 'UserEditorController@disableAccess')->name('userAdministration.disableAccess');
    Route::post('/users/enable', 'UserEditorController@enableAccess')->name('userAdministration.enableAccess');
    Route::post('/users/toggle', 'UserEditorController@toggleAccess')->name('userAdministration.toggleAccess');
    Route::post('/users/edit', 'UserEditorController@edit')->name('userAdministration.edit');
    Route::post('/users/password/change', 'UserEditorController@edit')->name('userAdministration.changePassword');
    Route::post('/users/role/add', 'UserEditorController@addRole')->name('userAdministration.addRole');
    Route::post('/users/role/remove', 'UserEditorController@removeRole')->name('userAdministration.removeRole');
});

// Route::get('/test', 'UserAdmnistration\AdminEditorController@addForm')->name('test');
