<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});
Route::get('/login', "AuthController@login")->name("login");
Route::post('/loginAction', "AuthController@loginAction");
Route::get('/logoutAction', "AuthController@logoutAction");
Route::post('/registerMemberAction', "AuthController@registerMemberAction");

Route::group(['middleware' => ['auth.basic', 'role:super_admin']], function () {
    Route::get('/superadmin', "SuperAdminController@index")->name("superAdminDashboard");
    Route::get('/superadmin/vaccine', "SuperAdminController@vaccine");
    Route::get('/superadmin/vaccine/add', "SuperAdminController@addVaccine");
    Route::post('/superadmin/vaccine/addAction', "SuperAdminController@addVaccineAction");
    Route::get('/superadmin/vaccine/edit/{id}', "SuperAdminController@editVaccine");
    Route::post('/superadmin/vaccine/editAction/{id}', "SuperAdminController@editVaccineAction");
    Route::get('/superadmin/vaccine/delete/{id}', "SuperAdminController@deleteVaccine");
    Route::get('/superadmin/administrator', "SuperAdminController@administrator");
    Route::get('/superadmin/administrator/add', "SuperAdminController@addAdministrator");
    Route::post('/superadmin/administrator/addAction', "SuperAdminController@addAdministratorAction");
    Route::get('/superadmin/administrator/edit/{id}', "SuperAdminController@editAdministrator");
    Route::post('/superadmin/administrator/editAction/{id}', "SuperAdminController@editAdministratorAction");
    Route::get('/superadmin/administrator/delete/{id}', "SuperAdminController@deleteAdministratorAction");
    Route::get('/superadmin/patient', "SuperAdminController@patient");
    Route::get('/superadmin/location', "SuperAdminController@location");
    Route::get('/superadmin/location/add', "SuperAdminController@addLocation");
    Route::post('/superadmin/location/addAction', "SuperAdminController@addLocationAction");
    Route::get('/superadmin/location/edit/{id}', "SuperAdminController@editLocation");
    Route::post('/superadmin/location/editAction/{id}', "SuperAdminController@editLocationAction");
    Route::get('/superadmin/location/delete/{id}', "SuperAdminController@deleteLocation");
});



Route::group(['middleware' => ['auth.basic', 'role:admin']], function () {
    Route::get('/admin', "AdminController@index")->name("adminDashboard");
    Route::get('/admin/schedule', "AdminController@schedule");
    Route::get('/admin/schedule/edit/{id}', "AdminController@editSchedule");
    Route::get('/admin/vaccine', "AdminController@vaccine");
    Route::get('/admin/vaccine/add', "AdminController@addVaccine");
    Route::get('/admin/patient', "AdminController@patient");
    Route::get('/admin/patient/edit/{id}', "AdminController@editPatient");
    Route::get('/admin/log', "AdminController@log");
});


Route::get('/register', function () {
    return view('register');
});
Route::get('/user/log', function () {
    return view('user.log');
});
Route::get('/user/schedule', function () {
    return view('user.schedule');
});

Route::get('/notfound', function () {
    return view('error');
});