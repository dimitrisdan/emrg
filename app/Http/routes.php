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

//
//Route::group(['middleware' => ['web']], function () {
//
//    Route::get('/', function () {
//        return view('auth.login');
//    })->middleware('guest');
//
//    Route::get('/tasks', 'TaskController@index');
//    Route::post('/task', 'TaskController@store');
//    Route::delete('/task/{task}', 'TaskController@destroy');
//
//    Route::auth();
//
//});

Route::group(['middleware' => 'web'], function () {

    /*
    |--------------------------------------------------------------------------
    | Core Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::post('/signup', [
        'uses' => 'UserController@postSignUp',
        'as' => 'signup'
    ]);
    Route::post('/signin', [
        'uses' => 'UserController@postSignIn',
        'as' => 'signin'
    ]);
    Route::get('/logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'logout'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Dashboard Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', [
        'uses' => 'PatientController@getDashboard',
        'as' => 'dashboard',
        'middleware' => 'auth'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Patient Routes
    |--------------------------------------------------------------------------
    */
    Route::post('/create-patient', [
        'uses' => 'PatientController@postCreatePatient',
        'as' => 'patient.create',
        'middleware' => 'auth'
    ]);

    Route::get('/delete-patient', [
        'uses' => 'ContactController@getDeleteContact',
        'as' => 'contact.create',
        'middleware' => 'auth'
    ]);
    
    /*
    |--------------------------------------------------------------------------
    | Contact Routes
    |--------------------------------------------------------------------------
    */
    
    Route::post('/create-contact', [
        'uses' => 'ContactController@postCreateContact',
        'as' => 'contact.create',
        'middleware' => 'auth'
    ]);

    Route::get('/delete-contact', [
        'uses' => 'ContactController@getDeleteContact',
        'as' => 'contact.create',
        'middleware' => 'auth'
    ]);
    /*
    |--------------------------------------------------------------------------
    | Guardian Routes
    |--------------------------------------------------------------------------
    */
    Route::post('/create-guardian', [
        'uses' => 'GuardianController@postCreateGuardian',
        'as' => 'guardian.create',
        'middleware' => 'auth'
    ]);

    Route::get('/delete-guardian', [
        'uses' => 'GuardianController@getDeleteGuardian',
        'as' => 'guardian.delete',
        'middleware' => 'auth'
    ]);

    Route::get('/guardian', [
        'uses' => 'GuardianController@getCreateGuardian',
        'as' => 'guardian.new',
        'middleware' => 'auth'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Allergy Routes
    |--------------------------------------------------------------------------
    */
    Route::post('/create-allergy', [
        'uses' => 'GuardianController@postCreateGuardian',
        'as' => 'guardian.create',
        'middleware' => 'auth'
    ]);

    Route::get('/delete-allergy', [
        'uses' => 'GuardianController@getDeleteGuardian',
        'as' => 'guardian.delete',
        'middleware' => 'auth'
    ]);

    Route::get('/allergy', [
        'uses' => 'AllergyController@getCreateGuardian',
        'as' => 'guardian.new',
        'middleware' => 'auth'
    ]);
});
