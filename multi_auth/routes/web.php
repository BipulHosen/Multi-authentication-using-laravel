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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin/login', 'Auth\AdminLoginController@showloginform')->name('admin.login');
Route::post('/adminlogin', 'Auth\AdminLoginController@login')->name('dologin');
Route::get('/admin/register', 'Auth\AdminRegisterController@showregisterform')->name('showregister');
Route::post('/adminregister', 'Auth\AdminRegisterController@register')->name('admin.register');
