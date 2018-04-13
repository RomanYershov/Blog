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

Auth::routes();

//Route::get('/home', 'TaskController@index')->name('home');
//
//\Illuminate\Support\Facades\Route::resource("/task", "TaskController");

//Route::get('/home', 'EmployeeController@home');

Route::resource("/employees", "EmployeeController");
Route::get("/fired","EmployeeController@fired")->middleware("auth");
Route::get("/member", "EmployeeController@member");

Route::resource("/news", "NewsController");

Route::get("/home", "NewsController@index");
Route::post("/comment", "NewsController@comment");

Route::middleware("myadmin")->group(function () {
    Route::get('/news/create', 'NewsController@create');
    Route::get('/employees/create', 'EmployeeController@create');
});
