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

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
Route::get('/', 'HomeController@dashboard');
Route::get('/home', 'HomeController@dashboard')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/user_profile', 'UserController@profile')->name('user_profile');
Route::post('/update_profile', 'UserController@update_profile')->name('update_profile');
Route::post('/update_password', 'UserController@update_password')->name('update_password');
Route::resource('/tutorial', 'TutorialController');
Route::resource('/user', 'CustomUserController');
Route::resource('/review', 'ReviewController');
Route::resource('/tutorialepisode', 'TutorialEpisodeController');
});