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
})->name('client.daily-report')->middleware('auth');

Route::get('/client/activities', function () {
    return view('client.activities-logger');
})->name('client.activities-logger')->middleware('auth');

Route::get('/client/daily-report-vis', function () {
    return view('client.daily-report-vis');
})->name('client.daily-report-vis')->middleware('auth');

Route::get('/client/activities-vis', function () {
    return view('client.activities-vis');
})->name('client.activities-vis')->middleware('auth');


Route::get('/client/account', function () {
    return view('client.account');
})->name('client.account')->middleware('auth');



//////////////////mentor routes //////////////////



Route::get('/mentor/account', function () {
    return view('mentor.account');
})->name('mentor.account')->middleware('auth');

Route::get('/mentor/daily-reports', function () {
    return view('mentor.daily-reports');
})->name('mentor.daily-reports')->middleware('auth');

Route::get('/mentor/clients', function () {
    return view('mentor.clients');
})->name('mentor.clients')->middleware('auth');

/////////////////admin routes //////////////////

Route::get('/admin/clients', function () {
    return view('admin.clients');
})->name('admin.clients')->middleware('auth');

Route::get('/admin/mentors', function () {
    return view('admin.mentors');
})->name('admin.mentors')->middleware('auth');

Route::get('/admin/daily-report-config', function () {
    return view('admin.daily-report-config');
})->name('admin.daily-report-config')->middleware('auth');

Route::get('/admin/create-client', function () {
    return view('admin.create-client');
})->name('admin.create-client')->middleware('auth');

Route::get('/admin/create-mentor', function () {
    return view('admin.create-mentor');
})->name('admin.create-mentor');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
