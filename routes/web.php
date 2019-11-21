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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/classes', 'ClassesController@index');
Route::get('/addclass', 'AddClassController@index');

Route::post('/saveclass', 'AddClassController@createClass');
Route::get('/class/edit/{id}', 'AddClassController@editClass');
// Route::get('/edit', 'AddClassController@editView');
Route::post('/updateClass', 'AddClassController@updateClass');
Route::get('/class/delete/{id}', 'AddClassController@deleteClass');

Route::get('/previousClasses', 'ClassesController@previousClasses');
Route::get('/availableClasses', 'ClassesController@availableClasses');

Route::get('/class/passive/{id}', 'AddClassController@passiveClass');
Route::get('/class/active/{id}', 'AddClassController@activeClass');
Route::get('/registeredClass', 'AddClassController@registeredClass');


