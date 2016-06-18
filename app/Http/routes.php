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
        'as' => 'signup',
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

    Route::any('/dashboard', [
        'uses' => 'PatientController@getDashboard',
        'as' => 'dashboard',
        'middleware' => ['auth', 'patient',]
    ]);

//    Route::post('/registration', [
//        'uses' => 'PatientController@',
//        'as' => '',
//        'middleware' => 'auth'
//    ]);

    /*
    |--------------------------------------------------------------------------
    | Patient Routes
    |--------------------------------------------------------------------------
    */
    
    Route::post('/update-patient', [
        'uses' => 'PatientController@postUpdatePatient',
        'as' => 'patient.update',
        'middleware' => 'auth'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Contact Routes
    |--------------------------------------------------------------------------
    */
    
    Route::post('/update-contact', [
        'uses' => 'ContactController@postUpdateContact',
        'as' => 'contact.update',
        'middleware' => 'auth'
    ]);

    Route::get('/delete-contact', [
        'uses' => 'ContactController@getDeleteContact',
        'as' => 'contact.create',
        'middleware' => 'auth'
    ]);

    Route::delete('/contact/{contact_id}', [
        'uses' => 'ContactController@deleteContact',
        'as' => 'contact.delete',
        'middleware' => 'auth'
    ]);
    /*
    |--------------------------------------------------------------------------
    | Guardian Routes
    |--------------------------------------------------------------------------
    */
    Route::post('/update-guardian', [
        'uses' => 'GuardianController@postUpdateGuardian',
        'as' => 'guardian.update',
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
        'uses' => 'AllergyController@createAllergy',
        'as' => 'allergy.create',
        'middleware' => ['auth', 'logging']
    ]);

    Route::get('/delete-allergy', [
        'uses' => 'AllergyController@deleteAllergy',
        'as' => 'allergy.delete',
        'middleware' => 'auth'
    ]);
//
//    Route::get('/allergy', [
//        'uses' => 'AllergyController@getCreateGuardian',
//        'as' => 'guardian.new',
//        'middleware' => 'auth'
//    ]);

    /*
   |--------------------------------------------------------------------------
   | Medical Alert Routes
   |--------------------------------------------------------------------------
   */
    Route::post('/create-medicalalert', [
        'uses' => 'MedicalAlertController@createMedicalAlert',
        'as' => 'medicalalert.create',
        'middleware' => ['auth']
    ]);

    Route::get('/delete-medicalalert', [
        'uses' => 'MedicalAlertController@deleteMedicalAlert',
        'as' => 'medicalalert.delete',
        'middleware' => 'auth'
    ]);

});
