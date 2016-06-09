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

    Route::get('/dashboard', [
        'uses' => 'PatientController@getDashboard',
        'as' => 'dashboard',
        'middleware' => 'auth'
    ]);


    Route::post('/patient', [
        'uses' => 'PatientController@postCreatePatient',
        'as' => 'patient.create'
    ]);

    Route::post('/contact', [
        'uses' => 'ContactController@postCreateContact',
        'as' => 'contact.create'
    ]);
    
    Route::post('/guardian', [
        'uses' => 'GuardianController@postCreateGuardian',
        'as' => 'guardian.create'
    ]);

    Route::get('/guardian', [
        'uses' => 'GuardianController@getCreateGuardian',
        'as' => 'guardian.new',
        'middleware' => 'auth'
    ]);

//    Route::get('/', function () {
//        return view('auth.login');
//    })->middleware('guest');

//    Route::get('/home', 'HomeController@index');
//    Route::get('/home', 'HomeController@index');

//    Route::get('user/{id}', 'UserController@showProfile');
    

//    Route::auth();



    

//    Route::get('/patient', 'PatientController@index');
});
