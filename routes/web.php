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

Route::get('/client/daily-report', function () {
    return view('client.daily-report');
})->name('client.daily-report');

Route::get('/client/activities', function () {
    return view('client.activities-logger');
})->name('client.activities-logger');

Route::get('/client/daily-report-vis', function () {
    return view('client.daily-report-vis');
})->name('client.daily-report-vis');

Route::get('/client/activities-vis', function () {
    return view('client.activities-vis');
})->name('client.activities-vis');


Route::get('/client/account', function () {
    return view('client.account');
})->name('client.account');

Route::get('/mentor/daily-reports', function () {
    return view('mentor.daily-reports');
})->name('mentor.daily-reports');

//////////////////mentor routes //////////////////



Route::get('/mentor/account', function () {
    return view('mentor.account');
})->name('mentor.account');

Route::get('/mentor/daily-reports', function () {
    return view('mentor.daily-reports');
})->name('mentor.daily-reports');

Route::get('/mentor/clients', function () {
    return view('mentor.clients');
})->name('mentor.clients');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
