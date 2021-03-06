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
/////////////////test routes///////////

// Route::get('/testmiddleware', function () {
//     return view('test.testmiddleware');
// })->name('test.testmiddleware');

// Route::get('/test', 'TestController@clientnaw'
// );

// Route::post('/testpost','TestController@testpost');


///////// overige route//////////////

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


///////////client routes////////////////

//client report routes

// Route::get('/client/daily-report', function () {
//     return view('reports.daily-report');
// })->name('client.daily-report')->middleware('auth','checkIsClient');


Route::get('/client/reports', 'ReportController@index'
)->name('client.reports')->middleware('auth','checkIsClient');

Route::get('/client/reports/{id}/edit', 'ReportController@edit'
)->name('client.edit-report')->middleware('auth','checkIsClient');

Route::put('/client/reports/{id}', 'ReportController@update'
)->name('client.update-report')->middleware('auth','checkIsClient');



/////////////client activities/////////////////


Route::get('/client/activities-logger/edit', 'ActivitiesController@edit'
)->name('client.activities-logger')->middleware('auth','checkIsClient');

Route::put('/client/activities-logger/{id}', 'ActivitiesController@update'
)->name('client.update-activities')->middleware('auth','checkIsClient');

// client config routes
Route::get('/client/activities-config' , 'ActivitiesConfigController@index'
)->name('client.activities-config')->middleware('auth','checkIsClient');

Route::post('/client/activities-config/delete/mainactivity' , 'ActivitiesConfigController@deleteMainActivity'
)->name('client.activities-config.delete.mainactivity')->middleware('auth','checkIsClient');

Route::post('/client/activities-config/delete/scaledactivity' , 'ActivitiesConfigController@deleteScaledActivity'
)->name('client.activities-config.delete.scaledactivity')->middleware('auth','checkIsClient');


Route::post('/client/activities-config/add/mainactivity' , 'ActivitiesConfigController@addMainActivity'
)->name('client.activities-config.add.mainactivity')->middleware('auth','checkIsClient');

Route::post('/client/activities-config/add/scaledactivity' , 'ActivitiesConfigController@addScaledActivity'
)->name('client.activities-config.add.scaledactivity')->middleware('auth','checkIsClient');


/////////////////////////
Route::get('/client/daily-report-vis', function () {
    return view('client.daily-report-vis');
})->name('client.daily-report-vis')->middleware('auth','checkIsClient');

Route::get('/client/activities-vis', function () {
    return view('client.activities-vis');
})->name('client.activities-vis')->middleware('auth','checkIsClient');

//////////////
Route::get('/client/account-personal/{id}', 'ClientController@show'
)->name('client.account-personal')->middleware('auth','checkIsClient');

Route::get('/client/account-personal/{id}/edit', 'ClientController@edit'
)->name('client.edit-personal-information')->middleware('auth','checkIsClient');

Route::put('/client/account-personal/{id}', 'ClientController@update'
)->name('client.update-personal-information')->middleware('auth','checkIsClient');
///////////////////

Route::get('/client/account-password/{id}/edit', 'PasswordController@edit'
)->name('client.edit-account-password')->middleware('auth','checkIsClient');

Route::put('/client/account-password/{id}', 'PasswordController@update'
)->name('client.update-password')->middleware('auth','checkIsClient');

// client.update-password

// Route::get('/client/account-password', 'ClientController@account'
// )->name('client.account-password')->middleware('auth','checkIsClient');

// Route::post('client/account/save','ClientController@save')->name('client.account.save');
// ->middleware('auth','checkIsClient');



//////////////////mentor routes //////////////////



Route::get('/mentor/account', function () {
    return view('mentor.account');
})->name('mentor.account')->middleware('auth','checkIsMentor');

Route::get('/mentor/daily-reports', function () {
    return view('mentor.daily-reports');
})->name('mentor.daily-reports')->middleware('auth','checkIsMentor');

Route::get('/mentor/clients', function () {
})->name('mentor.clients')->middleware('auth','checkIsMentor');

/////////////////admin routes //////////////////

Route::get('/admin/clients', 'ClientController@index'
)->name('admin.clients')->middleware('auth','checkIsAdmin');

Route::get('/admin/search-client', 'ClientController@search'
)->name('admin.search-client')->middleware('auth','checkIsAdmin');

Route::get('/admin/show-client/{id}', 'ClientController@adminShow'
)->name('admin.show-client')->middleware('auth','checkIsAdmin');

Route::get('/admin/toggle-client-account/{id}', 'AccountController@toggleClientAccount'
)->name('admin.toggle-client-account')->middleware('auth','checkIsAdmin');

Route::get('/admin/show-client-report-config/{id}', 'ReportController@showClientReport'
)->name('admin.show-client-report-config')->middleware('auth','checkIsAdmin');

Route::delete('/admin/delete-client-report-question/{id}', 'ReportController@deleteClientReportQuestion'
)->name('admin.delete-client-report-question')->middleware('auth','checkIsAdmin');

Route::post('/admin/add-client-report-question/{id}' , 'ReportController@addClientReportQuestion'
)->name('admin.add-client-report-question')->middleware('auth','checkIsAdmin');

// Route::get('/admin/create-client' , 'ClientController@createClient'
// )->name('admin.create-client')->middleware('auth','checkIsAdmin');





Route::get('/admin/mentors', function () {
    return view('admin.mentors');
})->name('admin.mentors')->middleware('auth','checkIsAdmin');

Route::get('/admin/daily-report-config', function () {
    return view('admin.daily-report-config');
})->name('admin.daily-report-config')->middleware('auth','checkIsAdmin');

Route::get('/admin/create-client', function () {
    return view('admin.create-client');
})->name('admin.create-client')->middleware('auth','checkIsAdmin');

Route::get('/admin/create-mentor', function () {
    return view('admin.create-mentor');
})->name('admin.create-mentor')->middleware('auth','checkIsAdmin');


// Verb          Path                        Action  Route Name
// GET           /users                      index   users.index
// GET           /users/create               create  users.create
// POST          /users                      store   users.store
// GET           /users/{user}               show    users.show
// GET           /users/{user}/edit          edit    users.edit
// PUT|PATCH     /users/{user}               update  users.update
// DELETE        /users/{user}               destroy users.destroy

// index,create,store,show,edit,update,destroy
