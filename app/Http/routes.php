<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
    Route::get('/admin', 'AdminController@dashboard');

    Route::get('/contact/people', [
    	'as' => 'contact.people.index',
    	'uses' => 'ContactsController@indexPeople'
    ]);

    Route::get('/contact/company', [
    	'as' => 'contact.company.index',
    	'uses' => 'ContactsController@indexCompany'
    ]);

    Route::get('/contact/people/create', [
    	'as' => 'contact.people.create',
    	'uses' => 'ContactsController@createPeople'
    ]);

    Route::get('/contact/company/create', [
        'as' => 'contact.company.create',
        'uses' => 'ContactsController@createCompany'
    ]);

    Route::post('/contact/people/store', [
        'as' => 'contact.people.store',
        'uses' => 'ContactsController@storePeople'
    ]);

    Route::post('/contact/company/store', [
        'as' => 'contact.company.store',
        'uses' => 'ContactsController@storeCompany'
    ]);

    Route::get('/contact/company/{id}', [
        'as' => 'contact.company.show',
        'uses' => 'ContactsController@showCompany'
    ]);

    Route::get('/contact/people/{id}', [
        'as' => 'contact.people.show',
        'uses' => 'ContactsController@showPeople'
    ]);

    Route::get('/contact/company/{id}/edit', [
        'as' => 'contact.company.edit',
        'uses' => 'ContactsController@editCompany'
    ]);

    Route::get('/contact/people/{id}/edit', [
        'as' => 'contact.people.edit',
        'uses' => 'ContactsController@editPeople'
    ]);

    Route::put('/contact/company/{id}/update', [
        'as' => 'contact.company.update',
        'uses' => 'ContactsController@updateCompany'
    ]);

    Route::put('/contact/people/{id}/update', [
        'as' => 'contact.people.update',
        'uses' => 'ContactsController@updatePeople'
    ]);

    Route::delete('/contact/company/{id}/delete', [
        'as' => 'contact.company.delete',
        'uses' => 'ContactsController@deleteCompany'
    ]);

    Route::delete('/contact/people/{id}/delete', [
        'as' => 'contact.people.delete',
        'uses' => 'ContactsController@deletePeople'
    ]);
});
