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

Route::get('/', function () {
    return view('welcome');
});
//For signup
Route::get('signup','HospitalController@signup');
Route::post('signup','HospitalController@storeSignupDetails');

//For Login
Route::get('login','HospitalController@loginForm');
Route::post('login','HospitalController@storeLoginForm');

//For getting patient details
Route::get('patientDetails','HospitalController@patientDetailsForm');
Route::post('patientDetails','HospitalController@storePatientDetails');

//For updaing the data
Route::get('edit/{id}','HospitalController@editData');
Route::post('update','HospitalController@update');

Route::get('remove/{id}','HospitalController@delete');

Route::get('/Hospital/login','HospitalController@cancel');

Route::get('displayData','HospitalController@displayData');

Route::post('search','HospitalController@searchView');

Route::get('displayfordoctorview','HospitalController@doctorView');



