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


// untuk Mahasiswa
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('login.admin');
Route::get('/login/student', 'Auth\LoginController@showStudentLoginForm')->name('login.student');
//Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('register.admin');
//Route::get('/register/student', 'Auth\RegisterController@showStudentRegisterForm')->name('register.student');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/student', 'Auth\LoginController@StudentLogin');
//Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('register.admin');
//oute::post('/register/student', 'Auth\RegisterController@createStudent')->name('register.student');

Route::view('/home', 'home')->middleware('auth');
Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/dashboard', 'dashboard');
});

Route::group(['middleware' => 'auth:student'], function () {
    Route::view('/student', 'student');
});
