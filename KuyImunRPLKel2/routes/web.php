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
    Route::get('/superadmin/administrator', "SuperAdminController@administrator");
    Route::get('/superadmin/administrator/add', "SuperAdminController@addAdministrator");
    Route::get('/superadmin/administrator/edit/{id}', "SuperAdminController@editAdministrator");
    Route::get('/superadmin/administrator/delete/{id}', "SuperAdminController@deleteAdministratorAction");
    Route::get('/superadmin/patient', "SuperAdminController@patient");
    
    Route::post('/superadmin/addVaksinLocationAction', "SuperAdminController@addVaksinLocationAction");
    Route::post('/superadmin/registerAdminAction', "SuperAdminController@registerAdminAction");
});


Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/admin/schedule', function () {
    return view('admin.schedule');
});
Route::get('/admin/vaccine', function () {
    return view('admin.vaccine');
});
Route::get('/admin/vaccine/add', function () {
    return view('admin.vaccine-add');
});
Route::get('/admin/patient', function () {
    return view('admin.patient');
});
Route::get('/admin/log', function () {
    return view('admin.log');
});


Route::get('/user/log', function () {
    return view('user.log');
});
Route::get('/user/schedule', function () {
    return view('user.schedule');
});