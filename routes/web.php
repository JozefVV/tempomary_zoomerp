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


Route::get('/user/{user}', 'UserAdmnistration\UserProfileController@profile')->name('profile');

Route::namespace('UserAdmnistration')->group(function () {
    Route::get('/users', 'UserAdministrationController@viewList')->name('userAdministration.list');
    Route::get('/users/register', 'UserAdministrationController@registerFormView')->name('userAdministration.register');

    Route::post('/users/create', 'UserAdministrationController@create')->name('userAdministration.create');
    Route::delete('/users/{user}/delete', 'UserAdministrationController@delete')->name('userAdministration.delete');
    Route::put('/users/{user}/disable', 'UserAdministrationController@disableAccess')->name('userAdministration.disableAccess');
    Route::put('/users/{user}/enable', 'UserAdministrationController@enableAccess')->name('userAdministration.enableAccess');
    Route::put('/users/{user}/toggle', 'UserAdministrationController@toggleAccess')->name('userAdministration.toggleAccess');
    Route::put('/users/{user}/edit', 'UserAdministrationController@edit')->name('userAdministration.edit');
    Route::put('/users/{user}/password/change', 'UserAdministrationController@changePassword')->name('userAdministration.changePassword');
    Route::put('/users/{user}/role/add', 'UserAdministrationController@addRole')->name('userAdministration.addRole');
    Route::put('/users/{user}/role/remove', 'UserAdministrationController@removeRole')->name('userAdministration.removeRole');
});

// Route::get('/test', 'UserAdmnistration\AdminEditorController@addForm')->name('test');
