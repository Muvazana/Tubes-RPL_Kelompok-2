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
Route::get('/login', function () {
    return view('login');
});
Route::get('/superadmin', function () {
    return view('superadmin.index');
});
Route::get('/superadmin/vaccine', function () {
    return view('superadmin.vaccine');
});
Route::get('/superadmin/administrator', function () {
    return view('superadmin.administrator');
});
Route::get('/superadmin/administrator/add', function () {
    return view('superadmin.administrator-add');
});
Route::get('/superadmin/patient', function () {
    return view('superadmin.patient');
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