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
//        'middleware' => ['before_signup', 'after_signup']
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
        'uses' => 'UserController@checkRoles',
        'as' => 'dashboard',
        'middleware' => ['auth']
    ]);

    Route::any('/dashboard/patient', [
        'uses' => 'PatientController@getDashboard',
        'as' => 'dashboard.patient',
        'middleware' => ['auth', 'role:pat', 'permission:view-patient', 'permission:edit-patient', 'patient']
    ]);

    Route::any('/dashboard/doctor', [
        'uses' => 'DoctorController@getDashboard',
        'as' => 'dashboard.doctor',
        'middleware' => ['auth', 'role:doc', 'permission:view-doctor']
    ]);

    Route::get('/dashboard/admin', [
        'uses' => 'AdminController@getDashboard',
        'as' => 'dashboard.admin',
        'middleware' => ['auth', 'role:admin', 'permission:view-admin']
    ]);
    
    Route::get('/dashboard/policies/', [
        'uses' => 'PatientController@getPolicies',
        'as' => 'dashboard.policies',
        'middleware' => ['auth', 'role:patient']
    ]);
//    Route::get('/dashboard/patient/{id}', [
//        'uses' => 'PatientController@getDashboard',
//        'as' => 'dashboard.patient',
//        'middleware' => ['auth', 'role:doc', 'permission:view-shared-dashboard', 'patient']
//    ]);
    
//    Route::post('/registration', [
//        'uses' => 'PatientController@',
//        'as' => '',
//        'middleware' => 'auth'
//    ]);
    /*
   |--------------------------------------------------------------------------
   | Roles and Permissions Routes
   |--------------------------------------------------------------------------
   */
    Route::post('/create-role', [
        'uses' => 'UserController@createRole',
        'as' => 'role.create',
        'middleware' => ['auth', 'role:admin']
    ]);

    Route::delete('/delete-role', [
        'uses' => 'UserController@deleteRole',
        'as' => 'role.delete',
        'middleware' => ['auth', 'role:admin']
    ]);
    
    Route::post('/create-permission', [
        'uses' => 'UserController@createPermission',
        'as' => 'permission.create',
        'middleware' => ['auth', 'role:admin']
    ]);
    Route::delete('/delete-permission', [
        'uses' => 'UserController@deletePermission',
        'as' => 'permission.delete',
        'middleware' => ['auth', 'role:admin']
    ]);
    
    /*
    |--------------------------------------------------------------------------
    | Patient Routes
    |--------------------------------------------------------------------------
    */
    
    Route::post('/update-patient', [
        'uses' => 'PatientController@postUpdatePatient',
        'as' => 'patient.update',
        'middleware' => ['auth','role:pat', 'permission:edit-patient']
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
