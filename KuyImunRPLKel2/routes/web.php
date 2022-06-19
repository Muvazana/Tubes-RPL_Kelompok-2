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
Route::get('/admin/home', function () {
    return view('admin.index');
});
Route::get('/admin/vaccine', function () {
    return view('admin.beach');
});
Route::get('/admin/administrator', function () {
    return view('admin.administrator');
});
Route::get('/admin/patient', function () {
    return view('admin.patient');
});