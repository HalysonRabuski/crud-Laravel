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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController');

Route::resource('course', 'CourseController');

Route::get('/course/{id}/delete', 'CourseController@destroy');

Route::get('/course/{id}/edit', 'CourseController@edit');

Route::get('/course/{id}', 'CourseController@update');

Route::resource('student', 'StudentController');

Route::get('/student/{id}/delete', 'StudentController@destroy');

Route::resource('city', 'CityController');
